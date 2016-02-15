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
    <meta name="msapplication-TileImage" content="/assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png" />
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />

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
</head>

<body <?php body_class(); ?>>
<!--Page Start-->   
<div id="page" > 
    <div class="header">
        <header class="mod-header scroll-header" itemscope="" itemtype="http://schema.org/WPHeader">
            <div class="header-wrap">
                <div class="row">
                    <div itemscope="" itemtype="http://schema.org/Organization" class="logo-wrapper left">
                        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" itemprop="url">
                            <img class="logo-img" src="http://cdn.jeanknowscars.com/img/logo.png?v=1" alt="<?php bloginfo('name'); ?>" height="112" width="155" itemprop="logo">
                        </a>
                    </div>

                    <div class="mod-header-right right">
                        <div class="header-jkc-top clearfix">
                            <div class="header-jkc-top-left left">
                                <h1 class="tagline" itemprop="headline">
                                    <span class="no-wrap">less car hassle</span>
                                    <span class="no-wrap">more car love</span>
                                </h1>
                            </div>
                            <!-- Display Social Links -->
                            <?php get_template_part('template-parts/navigation', 'social'); ?> 
                        </div>
                        <!-- Display Main Menu -->
                        <?php get_template_part('template-parts/navigation', 'top'); ?>                
                    </div>
                </div>
            </div>
        </header>        
    </div>
