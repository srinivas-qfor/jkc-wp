<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
include_once 'includes/grid.class.php';

wp_enqueue_style( 'mod-flipper-mobile', get_template_directory_uri() . '/assets/css/mod-flipper-mobile.css',null,null,"screen" );
wp_enqueue_style('mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css', null, null, "screen");


get_header(); ?>

<?php
wp_enqueue_style( 'mod-ad-top-mobile', get_template_directory_uri() . '/assets/css/mod-ad-top-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-title-mobile', get_template_directory_uri() . '/assets/css/mod-title-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-flipper-mobile', get_template_directory_uri() . '/assets/css/mod-flipper.css',null,null,"screen" );
wp_enqueue_style( 'mod-sort-by-category-mobile', get_template_directory_uri() . '/assets/css/mod-sort-by-category-mobile.css',null,null,"screen" );
wp_enqueue_style('mod-list-item-mobile', get_template_directory_uri() . '/assets/css/mod-list-item-mobile.css', null, null, "screen");


// scripts
wp_enqueue_script( 'mod-sort-by-category-mobile', get_template_directory_uri() . '/assets/js/mod-sort-by-category-mobile.js',null,null,true); 

$adBlock = 2;
$pageNum = (int)get_query_var('paged', 0);
if($pageNum >= 2 && $pageNum <= 6) {
	$adBlock = $pageNum + 1;
}

if (is_category()) {
	$this_category = get_category($cat);
}
$grid = new Grid;
?>

<div class="mod-title-mobile">
	<h1 class="pagetitle" itemprop="name"><?php echo (($cat == '126') ? "What's in Jean's Driveway" : single_cat_title());  ?></h1>
</div>

<!--Flipper-->
        <?php
        if (class_exists('Flipper') && shortcode_exists('flipper'))
            echo do_shortcode( '[flipper name="home-flipper-mobile" cat="'.$this_category->cat_ID.'"]' ) 
         ?>                                  
<!-- -->

<?php
$category_link = get_category_link( $cat );
$this_category_has_parent = $this_category->parent;
if($this_category_has_parent != '0'){
	$category_link = get_category_link($this_category_has_parent);
}

if($this_category->category_parent){ 
	$this_category = get_categories(array(
			'child_of' => $this_category->category_parent,
			'orderby' => 'date'
		));
}else{
	$this_category = get_categories(array(
			'child_of' => $this_category->cat_ID,
			'orderby' => 'date'
		));
}
?>

<?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="2"]'); ?> 



<?php if(!empty($this_category)) : ?>
<div class="mod-sort-by-category-mobile dropdown-custom">
	<select title="<?php echo (($this_category_has_parent != 0) ? single_cat_title() : 'Sort by Category') ; ?>" onchange="window.location.href=this.options[this.selectedIndex].value;" style="z-index: 10; opacity: 0;">
		<?php //if($this_category_has_parent == '0') { ?> 
		<option value="<?php echo $category_link;?>">View All</option>
		<?php //} 
		foreach ($this_category as $sub_cat) {
			echo "<option value=\"".get_category_link($sub_cat->term_id)."\" ".(($cat == $sub_cat->term_id) ? 'selected="selected"' : '').">{$sub_cat->name}</option>";
		}?>
	</select>
</div>
<?php endif; ?>

<div class="mod-list-item-wrap">
	<div class="load-more-well clearfix">
		<?php global $posts; $grid->loopItems($posts); ?>
	</div>
</div>

<div class="mod-load-more">
<?php
// Previous/next page navigation.
if ( have_posts() ) : 
    the_posts_pagination(array(
        'prev_text' => __('Previous page', 'twentysixteen'),
        'next_text' => __('Next page', 'twentysixteen'),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentysixteen') . ' </span>',
    ));
endif;
?>
    <a class="button btn-main-cta btn-loading"
    style = "display:none;" href="/" title="Load more">
    <i class="fa fa-refresh fa-spin"></i>
    </a>
</div>

<?php get_footer(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".mod-flipper-mobile ").addClass("category");
	});

</script>