<?php 
/**
 * Partial: SEO meta
 * Dependency: Plugin - Mod SEO Meta
 */
use JKC\Meta;

foreach ($this->tags as $tag) {
	
	$tagStr = '';

	$name = $tag->getName();
	$prop = $tag->getProp();
	$itemProp = $tag->getItemProp();
	$content = $tag->getContent();
	
	// detect title tag
	if($name === 'title') {
		$tagStr .= '<title>'.$content.'</title>'."\n";
		echo $tagStr;
		continue;
	}

	// set name
	if(!empty($name)) {
		$tagStr .= ' name="'.$name.'"';
	}

	// set property
	if(!empty($prop)) {
		$tagStr .= ' property="'.$prop.'"';
	}

	// set itemprop
	if(!empty($itemProp)) {
		$tagStr .= ' itemprop="'.$itemProp.'"';
	}

	// set content
	if(!empty($tagStr) && !empty($content)) {
		$tagStr .= ' content="'.$content.'"';
	}

	$tagStr = !empty($tagStr) ? '<meta'.$tagStr.' />' : '';

	echo $tagStr."\n";
}