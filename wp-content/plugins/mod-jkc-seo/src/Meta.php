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

    public function detectPage() {

        // default fallback to home
        $page = 'home';

        if(is_single()) {
            $page = 'detail';
        }
        else if(is_category()) {
            $page = 'listing';
        }
        else if(is_author()) {
            $page = 'author';
        }
        else if(is_page()) {
            $page = 'page';
        }
        return $page;
    }

    public function generateTags() {
        $page = $this->detectPage();

        switch ($page) {
            case 'home':
                # code...
                break;

            case 'listing':
                $this->getCategoryPage();
                break;
            
            case 'detail':
                $this->getSinglePost();
                break;

            case 'page':
                $this->getPage();
                break;
            
            default:
                # code...
                break;
        }

        // set common tags last to give preference to title tag
        $this->setCommonTags();
    }

    private function getPage() {

        
    }

    private function getSinglePost() {
        $title = get_post_meta(get_the_ID(), 'metaTitle', true);
        $title = !empty($title) ? $title : get_post_meta(get_the_ID(), get_the_title().' - '.get_bloginfo('name'), true);
        $this->tags->append(new MetaEntity('title', $title));
        $this->tags->append(new MetaEntity('', $title, 'og:title'));
        $this->tags->append(new MetaEntity('', $title, 'twitter:title'));

        $keywords = get_post_meta(get_the_ID(), 'metaKeywords', true);
        $keywords = is_array($keywords) ? implode(',', $keywords) : $keywords;
        $this->tags->append(new MetaEntity('keywords', $keywords));

        $desc = get_post_meta(get_the_ID(), 'metaDescription', true);
        $desc = !empty($desc) ? $desc : get_post_meta(get_the_ID(), 'promoTeaserSmall', true);
        $this->setDescriptionTag($desc);

        $category = get_the_category();
        $category = is_array($category) ? $category[0]->name : $category->name;
        $this->tags->append(new MetaEntity('', $category, 'articleSection'));
        $this->tags->append(new MetaEntity('', $category, 'genre'));
        $this->tags->append(new MetaEntity('', $category, 'article:section'));

        $this->setDateTags();

        $this->tags->append(new MetaEntity('', get_the_title(), 'headline'));
        $this->tags->append(new MetaEntity('', get_the_excerpt(), 'alternativeHeadline'));
        $this->tags->append(new MetaEntity('', get_the_author(), 'author'));
        $this->tags->append(new MetaEntity('', get_the_excerpt(), 'about'));
    }

    private function getCategoryPage() {
        global $cat;
        $title = get_term_meta($cat, 'meta-title', true);
        $title = !empty($title) ? $title : get_bloginfo('name');
        $this->setTitleTag($title);

        $desc = get_term_meta($cat, 'meta-description', true);
        $this->setDescriptionTag($desc);

        $this->tags->append(new MetaEntity('keywords', get_term_meta($cat, 'meta-keywords', true), '', 'keywords'));

        $this->tags->append(new MetaEntity('', 'website', 'og:type'));
    }

    private function setCommonTags() {
        $settings = get_option('jkc_settings', array());

        if(!empty($settings['seo_domain_verify'])) {
            $this->tags->append(new MetaEntity('p:domain_verify', $settings['seo_domain_verify']));
        }

        $this->tags->append(new MetaEntity('', get_bloginfo('name'), 'og:site_name'));
        if(!empty($settings['fb_admins'])) {
            $this->tags->append(new MetaEntity('', !empty($settings['fb_admins']) ? $settings['fb_admins'] : '', 'fb:admins'));
        }
        if(!empty($settings['fb_app_id'])) {
            $this->tags->append(new MetaEntity('', !empty($settings['fb_app_id']) ? $settings['fb_app_id'] : '', 'fb:app_id'));
        }

        $this->tags->append(new MetaEntity('', !empty($settings['fb_page_id']) ? $settings['fb_page_id'] : ' ', 'fb:page_id'));

        $this->tags->append(new MetaEntity('', get_locale(), 'inLanguage'));
        $this->tags->append(new MetaEntity('', get_locale(), 'og:locale'));
        $this->tags->append(new MetaEntity('', !empty($settings['twitter_url']) ? '@'.$settings['twitter_url'] : '', 'twitter:card'));
        $this->tags->append(new MetaEntity('', 'summary', 'twitter:site'));

        $this->setCurrentURLTags();
    }

    private function setTitleTag($title = '') {
        $this->tags->append(new MetaEntity('title', $title));
        $this->tags->append(new MetaEntity('', $title, 'og:title'));
        $this->tags->append(new MetaEntity('twitter:title', $title));
    }

    private function setDescriptionTag($desc = '') {
        $this->tags->append(new MetaEntity('description', $desc));
        $this->tags->append(new MetaEntity('', $desc, 'article:tag'));
        $this->tags->append(new MetaEntity('', $desc, 'og:description'));
        $this->tags->append(new MetaEntity('twitter:description', $desc));
    }

    private function setDateTags() {      
        $this->tags->append(new MetaEntity('', get_the_date('c'), 'datePublished'));
        $this->tags->append(new MetaEntity('', get_the_modified_date('c'), 'dateModified'));
        $this->tags->append(new MetaEntity('', get_the_date('c'), 'article:published_time'));
        $this->tags->append(new MetaEntity('', get_the_modified_date('c'), 'article:modified_time'));
    }

    private function setCurrentURLTags() {
        global $wp;
        $current_url = home_url(add_query_arg(array(),$wp->request));
        $this->tags->append(new MetaEntity('', $current_url, 'twitter:url'));
        $this->tags->append(new MetaEntity('', $current_url, 'og:url', 'url'));        
    }

    public function getTags() {
        return $this->tags;
    }

    public function outputTags() {
        if(file_exists(get_stylesheet_directory().self::PATH)) {
            require get_stylesheet_directory() . self::PATH;
        }
        else {
            require JKC_SEO_PLUGIN_DIR . self::PATH;
        }
    }
}
