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
        <div class="menu-wrap">
            <nav>
                <ul class="primary-menu clearfix">
                    <li class="nav-item first <?php echo (in_array('jeans-driveway', $section) ? 'active' : '') ?>">
                        <a id="Header-jeans-driveway" class="button-link" href="/jeans-driveway/" title="Jean's Driveway">Jean's Driveway</a>
                    </li>
                    <li class="nav-item <?php echo (in_array('you-auto-know', $section) ? 'active' : '') ?>">
                        <a id="Header-you-auto-know" class="button-link" href="/you-auto-know/" title="You Auto Know">You Auto Know</a>
                    </li>
                    <li class="nav-item <?php echo (in_array('kids-in-the-car', $section) ? 'active' : '') ?>">
                        <a id="Header-kids-in-the-car" class="button-link" href="/kids-in-the-car/" title="Kids in the Car">Kids in the Car</a>
                    </li>
                    <li class="nav-item <?php echo (in_array('cool-tech', $section) ? 'active' : '') ?>">
                        <a id="Header-cool-tech" class="button-link" href="/cool-tech/" title="Cool Tech">Cool Tech</a>
                    </li>
                    <li class="nav-item <?php echo (in_array('car-life', $section) ? 'active' : '') ?>">
                        <a id="Header-car-life" class="button-link" href="/car-life/" title="Car Life">Car Life</a>
                    </li>
                    <li class="nav-item <?php echo (in_array('life-with-jean', $section) ? 'active' : '') ?>">
                        <a id="Header-life-with-jean" class="button-link" href="/life-with-jean/" title="Car Life">Life with Jean</a>
                    </li>
                    <li class="nav-item last <?php echo (in_array('new-cars', $section) ? 'active' : '') ?>">
                        <a id="Header-car-guide" class="button-link" href="/new-cars/" title="Car Guide">Car Guide</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="u-option u-option-social-mobile">
            <h4 class="logo"><a class="title-link noHighlight" href="#" title="Jean Knows Cars"><span class="hidden">Jean Knows Cars</span></a></h4>
            <ul class="social-List">
                <li class="social-item"><a target="_blank" class="social-Link pinterest" href="<?php echo $links['pinterest']; ?>" title="Pinterest"><i class="fa fa-pinterest-square"></i><span class="hidden">Pinterest</span></a></li>
                <li class="social-item"><a target="_blank" class="social-Link google" href="<?php echo $links['googleplus']; ?>" title="Google"><i class="fa fa-google-plus-square"></i><span class="hidden">Google</span></a></li>
                <li class="social-item"><a target="_blank" class="social-Link facebook" href="<?php echo $links['facebook']; ?>" title="Facebook"><i class="fa fa-facebook-square"></i><span class="hidden">Facebook</span></a></li>
                <li class="social-item"><a target="_blank" class="social-Link twitter" href="<?php echo $links['twitter']; ?>" title="Twitter"><i class="fa fa-twitter-square"></i><span class="hidden">Twitter</span></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="search-content search-cont hide">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="search" type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type your search here...', 'placeholder', '' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', '' ); ?>" />
            <button class="search-button search-btn" tabindex="1" style="border:none;"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="mobile-column">
