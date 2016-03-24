<?php
/**
 * Meta Plugin: init service
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license  http://opensource.org/licenses/MIT MIT
 */

namespace JKC\Meta;

/**
 * Meta Plugin: init service
 */
class Meta 
{
    const PATH = '/template-parts/seo-meta.php';
    private $tags;

    function __construct() {
        $this->tags = new \ArrayObject();
        $this->generateTags();
        $this->outputTags();
    }

    /**
     * NOTE: This function only returns type of page to make it reusable
     * @param null
     * @return string $page
     */
    public function detectPage() {

        // default fallback to home
        $page = 'home';
        
        if(is_single()) {
            $page = 'detail';
        }
        else if(is_category()) {
            $page = 'listing';
            $model = get_query_var('make-model');
            if(!empty($model)) {
                $page = 'make-model';
            }
        }
        else if(is_tax()) {
            $page = 'taxonomy';
        }
        else if(is_author()) {
            $page = 'author';
        }
        else if(is_page()) {
            $page = 'page';
        }
        return $page;
    }

    /**
     * Generates tag objects based on the page
     * @param null
     * @return null
     */
    public function generateTags() {
        $page = $this->detectPage();

        // set tags to home page which has basic tags
        // default fallback home
        // call respective page or any new after this to override
        $this->getHomePage();

        switch ($page) {
            case 'home':
                $this->getHomePage();
                break;

            case 'listing':
                $category = get_queried_object();
                // special treatment for make category
                if($category->parent === 119) {
                    $this->getTaxonomyPage($category, true);
                }
                else {
                    $this->getCategoryPage();
                }                
                break;

            case 'taxonomy':
                $taxonomy = get_queried_object();
                $this->getTaxonomyPage($taxonomy);
                break;

            case 'make-model':
                $model = get_query_var('make-model');
                $taxonomy = get_term_by('slug', $model, 'make-model');
                $this->getTaxonomyPage($taxonomy);
                break;
            
            case 'detail':
                $this->getSinglePost();
                break;

            case 'page':
                $this->getPage();
                break;

            case 'author':
                $this->getAuthorPage();
                break;
            
            default:
                $this->getHomePage();
                break;
        }

        // set common tags last to give preference to title tag
        $this->setCommonTags();
    }

    /**
     * Sets tags for home page
     * @param null
     * @return null
     */
    private function getHomePage() {
        $settings = get_option('jkc_settings', array());
        
        $this->setTitleTag($settings['meta_title']);
        $this->tags->offsetSet('keywords', new MetaEntity('keywords', $settings['meta_keywords']));
        $this->setDescriptionTag($settings['meta_description']);

    }

    /**
     * Sets tags for single stand alone page
     * @param null
     * @return null
     */
    private function getPage() {
        $title = get_post_meta(get_the_ID(), 'metaTitle', true);
        $title = !empty($title) ? $title : get_post_meta(get_the_ID(), get_the_title().' - '.get_bloginfo('name'), true);
        $this->setTitleTag($title);

        $keywords = get_post_meta(get_the_ID(), 'metaKeywords', true);
        $keywords = is_array($keywords) ? implode(',', $keywords) : $keywords;
        $this->tags->offsetSet('keywords', new MetaEntity('keywords', $keywords));

        $desc = get_post_meta(get_the_ID(), 'metaDescription', true);
        $desc = !empty($desc) ? $desc : get_post_meta(get_the_ID(), 'promoTeaserSmall', true);
        $this->setDescriptionTag($desc);
    }

    /**
     * Sets tags for single post article
     * @param null
     * @return null
     */
    private function getSinglePost() {
        $title = get_post_meta(get_the_ID(), 'metaTitle', true);
        $title = !empty($title) ? $title : get_post_meta(get_the_ID(), get_the_title().' - '.get_bloginfo('name'), true);
        $this->tags->offsetSet('title', new MetaEntity('title', $title));
        $this->tags->offsetSet('og:title', new MetaEntity('', $title, 'og:title'));
        $this->tags->offsetSet('twitter:title', new MetaEntity('', $title, 'twitter:title'));

        $keywords = get_post_meta(get_the_ID(), 'metaKeywords', true);
        $keywords = is_array($keywords) ? implode(',', $keywords) : $keywords;
        $this->tags->offsetSet('keywords', new MetaEntity('keywords', $keywords));

        $desc = get_post_meta(get_the_ID(), 'metaDescription', true);
        $desc = !empty($desc) ? $desc : get_post_meta(get_the_ID(), 'promoTeaserSmall', true);
        $this->setDescriptionTag($desc);

        $category = get_the_category();
        $category = is_array($category) ? $category[0]->name : $category->name;
        $this->tags->offsetSet('articleSection', new MetaEntity('', $category, 'articleSection'));
        $this->tags->offsetSet('genre', new MetaEntity('', $category, 'genre'));
        $this->tags->offsetSet('article:section', new MetaEntity('', $category, 'article:section'));

        $this->setDateTags();

        $this->tags->offsetSet('headline', new MetaEntity('', get_the_title(), 'headline'));
        $this->tags->offsetSet('alternativeHeadline', new MetaEntity('', get_the_excerpt(), 'alternativeHeadline'));
        $this->tags->offsetSet('author', new MetaEntity('', get_the_author(), 'author'));
        $this->tags->offsetSet('about', new MetaEntity('', get_the_excerpt(), 'about'));
    }

    /**
     * Sets tags for category index (list) page
     * @param null
     * @return null
     */
    private function getCategoryPage() {
        global $cat;
        $title = get_term_meta($cat, 'meta-title', true);
        $title = !empty($title) ? $title : get_bloginfo('name');
        $this->setTitleTag($title);

        $desc = get_term_meta($cat, 'meta-description', true);
        $this->setDescriptionTag($desc);

        $this->tags->offsetSet('keywords', new MetaEntity('keywords', get_term_meta($cat, 'meta-keywords', true), '', 'keywords'));

        $this->tags->offsetSet('og:type', new MetaEntity('', 'website', 'og:type'));
    }

    /**
     * Sets tags for tags archive page
     * @param null
     * @return null
     */
    private function getTaxonomyPage($tag = '', $useSettings = false) {
        if(empty($tag)) $tag = get_queried_object();
        $model = get_query_var('make-model');

        $meta = get_term_meta($tag->term_id);
        $settings = get_option('jkc_settings', array());
        $category = get_the_category();
        if(is_array($category)) {
            $category = $category[0];
        }

        $page_num = get_query_var('paged');

        $tokens = array(
            "[[[site_name]]]"    => get_bloginfo('name'),
            "[[[current_year]]]" => date('Y'),
            "[[[next_year]]]"    => (int)date('Y') + 1,
            "[[[last_year]]]"    => (int)date('Y') - 1,
            "[[[vehicle_make]]]" => $category->name,
            "[[[vehicle_model]]]"=> $tag->name,
            "[[[page_num]]]"     => ($page_num > 0) ? $page_num : ''
        );

        $title = isset($meta['meta-title'][0]) ? $meta['meta-title'][0] : '';
        if($useSettings) {
            $title = !empty($settings['meta_title_make_mode_pagi']) ? strtr($settings['meta_title_make_mode_pagi'], $tokens) : '';
        }
        $title = !empty($title) ? $title : get_bloginfo('name');
        $this->setTitleTag($title);

        $desc = isset($meta['meta-description'][0]) ? $meta['meta-description'][0] : '';
        $this->setDescriptionTag($desc);

        $this->tags->offsetSet('keywords', new MetaEntity('keywords', (isset($meta['meta-description'][0]) ? $meta['meta-description'][0] : ''), '', 'keywords'));

        $this->tags->offsetSet('og:type', new MetaEntity('', 'website', 'og:type'));
    }

    /**
     * Sets tags for author detail page
     * @param null
     * @return null
     */
    private function getAuthorPage() {
        $settings = get_option('jkc_settings', array());

        $tokens = array(
            "[[[author_name]]]" => get_the_author(),
            "[[[job_title]]]"   => get_the_author_meta('userJobTitle'),
            "[[[site_name]]]"   => get_bloginfo('name')
        );

        if(!empty($settings['meta_title_author'])) {
            $title = strtr($settings['meta_title_author'], $tokens);
            $this->setTitleTag($title);
        }

        if(!empty($settings['meta_keywords_author'])) {
            $keywords = strtr($settings['meta_keywords_author'], $tokens);
            $this->tags->offsetSet('keywords', new MetaEntity('keywords', $keywords, '', 'keywords'));
        }

        if(!empty($settings['meta_description_author'])) {
            $desc = strtr($settings['meta_description_author'], $tokens);
            $this->setDescriptionTag($desc);
        }
    }

    /**
     * Sets common tags
     * @param null
     * @return null
     */
    private function setCommonTags() {
        $settings = get_option('jkc_settings', array());

        if(!empty($settings['seo_domain_verify'])) {
            $this->tags->offsetSet('p:domain_verify', new MetaEntity('p:domain_verify', $settings['seo_domain_verify']));
        }

        $this->tags->offsetSet('og:site_name', new MetaEntity('', get_bloginfo('name'), 'og:site_name'));
        if(!empty($settings['fb_admins'])) {
            $this->tags->offsetSet('fb:admins', new MetaEntity('', !empty($settings['fb_admins']) ? $settings['fb_admins'] : '', 'fb:admins'));
        }
        if(!empty($settings['fb_app_id'])) {
            $this->tags->offsetSet('fb:app_id', new MetaEntity('', !empty($settings['fb_app_id']) ? $settings['fb_app_id'] : '', 'fb:app_id'));
        }

        $this->tags->offsetSet('fb:page_id', new MetaEntity('', !empty($settings['fb_page_id']) ? $settings['fb_page_id'] : ' ', 'fb:page_id'));

        $this->tags->offsetSet('inLanguage', new MetaEntity('', get_locale(), 'inLanguage'));
        $this->tags->offsetSet('og:locale', new MetaEntity('', get_locale(), 'og:locale'));
        $this->tags->offsetSet('twitter:card', new MetaEntity('', !empty($settings['twitter_url']) ? '@'.$settings['twitter_url'] : '', 'twitter:card'));
        $this->tags->offsetSet('twitter:site', new MetaEntity('', 'summary', 'twitter:site'));

        $this->setCurrentURLTags();
    }

    /**
     * Helper function to set title tag
     * @param null
     * @return null
     */
    private function setTitleTag($title = '') {
        $this->tags->offsetSet('title', new MetaEntity('title', $title));
        $this->tags->offsetSet('og:title', new MetaEntity('', $title, 'og:title'));
        $this->tags->offsetSet('twitter:title', new MetaEntity('twitter:title', $title));
    }

    /**
     * Helper function to set description tag
     * @param null
     * @return null
     */
    private function setDescriptionTag($desc = '') {
        $this->tags->offsetSet('description', new MetaEntity('description', $desc));
        $this->tags->offsetSet('article:tag', new MetaEntity('', $desc, 'article:tag'));
        $this->tags->offsetSet('og:description', new MetaEntity('', $desc, 'og:description'));
        $this->tags->offsetSet('twitter:description', new MetaEntity('twitter:description', $desc));
    }

    /**
     * Helper function to set date tag
     * @param null
     * @return null
     */
    private function setDateTags() {      
        $this->tags->offsetSet('datePublished', new MetaEntity('', get_the_date('c'), 'datePublished'));
        $this->tags->offsetSet('dateModified', new MetaEntity('', get_the_modified_date('c'), 'dateModified'));
        $this->tags->offsetSet('article:published_time', new MetaEntity('', get_the_date('c'), 'article:published_time'));
        $this->tags->offsetSet('article:modified_time', new MetaEntity('', get_the_modified_date('c'), 'article:modified_time'));
    }

    /**
     * Helper function to set url tag
     * @param null
     * @return null
     */
    private function setCurrentURLTags() {
        global $wp;
        $current_url = home_url(add_query_arg(array(),$wp->request));
        $this->tags->offsetSet('twitter:url', new MetaEntity('', $current_url, 'twitter:url'));
        $this->tags->offsetSet('og:url', new MetaEntity('', $current_url, 'og:url', 'url'));        
    }

    /**
     * Helper function to return set tags
     * NOTE: Can be used for custom generation when template overrides
     * @param null
     * @return tags collection
     */
    public function getTags() {
        return $this->tags;
    }

    /**
     * Print the tag output
     * @param null
     * @return null
     */
    public function outputTags() {
        if(file_exists(get_stylesheet_directory().self::PATH)) {
            require get_stylesheet_directory() . self::PATH;
        }
        else {
            require JKC_SEO_PLUGIN_DIR . self::PATH;
        }
    }
}
