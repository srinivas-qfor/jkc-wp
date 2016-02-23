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
        $this->setCommonTags();

        switch ($page) {
            case 'home':
                # code...
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
    }

    private function getSinglePost() {

    }

    private function getPage() {

        
    }

    private function setCommonTags() {
        $title = get_post_meta(get_the_ID(), 'metaTitle', true);
        $title = !empty($title) ? $title : get_post_meta(get_the_ID(), get_the_title().' - '.get_bloginfo('name'), true);
        $this->tags->append(new MetaEntity('title', $title));

        $keywords = get_post_meta(get_the_ID(), 'metaKeywords', true);
        $keywords = is_array($keywords) ? implode(',', $keywords) : $keywords;
        $this->tags->append(new MetaEntity('keywords', $keywords));

        $desc = get_post_meta(get_the_ID(), 'metaDescription', true);
        $desc = !empty($desc) ? $desc : get_post_meta(get_the_ID(), 'promoTeaserSmall', true);
        $this->tags->append(new MetaEntity('description', $desc));
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
