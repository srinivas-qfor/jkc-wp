<?php
/**
 * The template for displaying Author archive pages
 *
 */

get_header(); 

## Loading CSS for pages
wp_enqueue_style( 'mod-title-mobile', get_template_directory_uri() . '/assets/css/mod-title-mobile.css',null,null,"screen" );


$userSocialLinks = array();
foreach(get_the_author_meta('userSocialLinks') as $social) {
	$userSocialLinks[$social->LinkType] = $social->LinkUrl;
}

$id = get_post();
?>

<div class="mod-title">
    <div class="pagetitle" itemprop="name">About Us</div>
        <div class="desc">We believe cars are freedom, motion, and beauty. They're a means for living a much richer life. They're also the JKC Team's excuse for having a great time together. Jean Jennings has cleverly gathered the assortment of creative people you see below.
    <br>
    <br>
    <strong>Our mission:</strong>
    to take the mystery out of car ownership but leave in all the emotion. Our team intends to take you on adventures, tell you great stories, and give you the information you want and need. We hope you’ll talk back to us all over the site.</div>
</div>

<?php get_footer(); ?>
