<?php
/**
 * Meta Plugin: Entity
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license  http://opensource.org/licenses/MIT MIT
 */

namespace JKC\Meta;

/**
 * Meta Plugin: Entity
 */
class MetaEntity
{
    private $name;
    private $itemprop;
    private $property;
    private $content;

    function __construct($name = '', $content = '', $prop = '', $iprop = '') {
        $this->setName($name);
        $this->setItemProp($iprop);
        $this->setProp($prop);
        $this->setContent($content);
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setItemProp($prop) {
        $this->itemprop = $prop;
    }

    public function setProp($prop) {
        $this->property = $prop;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getName() {
        return $this->name;
    }

    public function getItemProp() {
        return $this->itemprop;
    }

    public function getProp() {
        return $this->property;
    }

    public function getContent() {
        return $this->content;
    }
}
