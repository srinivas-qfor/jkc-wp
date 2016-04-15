<?php
/**
 * The template for displaying the header
 * @package Jean_Knows_Cars
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml">
<head>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="msapplication-TileColor" content="#d8232a">              
    <meta name="msapplication-TileImage" content="/wp-content/themes/jeanknowscars/assets/img/apple-touch-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="/wp-content/themes/jeanknowscars/assets/img/apple-touch-icon.png" />
    <link rel="shortcut icon" href="/wp-content/themes/jeanknowscars/assets/img/favicon.ico" />

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <!--[if lt IE 9]>
       <script src="/js/selectivizr-min.js"></script>
    <![endif]-->

     <!-- Typekit -->
    <script type="text/javascript" src="//use.typekit.net/hcl6hob.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <?php wp_head(); ?>
	<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>
</head>

<body <?php body_class('mobile-page'); ?>>
<!--Page Start-->   
<div id="page" > 
    <header class="mod-header-mobile clearfix" itemscope itemtype="http://schema.org/WPHeader">
    <div class="menu-icon left">
        <i class="fa fa-bars"></i>
        <i class="fa fa-search"></i>
    </div>
        
    <div class="right" itemscope itemtype="http://schema.org/Organization">
        <a class="logo-mobile" href="<?php echo esc_url(home_url('/')); ?>" title="Jean Knows Cars" itemprop="url"></a>
    </div>
</header>

<div class="main-menu hide">
    <div class="header-column-wrapper clearfix">
        <div class="logo-mobile-img" itemscope itemtype="http://schema.org/Organization">
            <a class="logo-mobile" href="<?php echo esc_url(home_url('/')); ?>" title="Jean Knows Cars" itemprop="url"></a>
        </div>
        <?php get_template_part('template-parts/navigation', 'mobile-top'); ?>
        <div class='u-option u-option-social-mobile'>
               <h4 class="logo"><a class="title-link noHighlight" href="<?php echo esc_url(home_url('/')); ?>" title="Jean Knows Cars"><span class="hidden">Jean Knows Cars</span></a></h4>
              <?php echo do_shortcode( '[social_links name="footer"]' ) ?>
        </div>
    </div>
</div>
<div class="search-content search-cont hide">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="search" type="search" class="search-field" id='jkc_searchfield' placeholder="<?php echo esc_attr_x( 'Type your search here...', 'placeholder', '' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', '' ); ?>" />
            <button class="search-button search-btn" tabindex="1" onclick="return checkmeNotEmpty();" style="border:none;"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="mobile-column">
