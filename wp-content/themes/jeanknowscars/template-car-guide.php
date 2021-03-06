<?php
/*
 * Template Name: Car Guide
 * Description: Page template with car categories
 */

include_once  (ABSPATH .'wp-admin/includes/taxonomy.php');


get_header(); 



## Loading CSS for front page
wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-mrec', get_template_directory_uri() . '/assets/css/mod-ad-mrec.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-make-model', get_template_directory_uri() . '/assets/css/mod-filter-make-model.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-vehicle-type', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-make', get_template_directory_uri() . '/assets/css/mod-browse-by-make.css',null,null,"screen" );
wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );



## Loading js for front page
wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
     'parent' => 119
    ) );



?>

<!-- -->
<div class="content-top-wrap">
    <div class="row">
        <?php get_template_part('template-parts/navigation','breadcrumb'); ?>   
        <div class="mod-title">
            <h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ));?></h1>
            <div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
        </div> 
    </div>
</div>


        
        
<div class="row">
        <div class="main-column left col-17">
           

    <!-- vehile -->
    <div class="mod-browse-by-vehicle-type">
            <h2>Browse by Vehicle Type</h2>
        <ul class="tiles">
                <li class="tile tile-family">
                    <a href="/family/" class="tile-link" title="Family">
                    <span class="tile-name">Family</span>
                    </a>
                </li>
                <li class="tile tile-first-car">
                <a href="/first-car/" class="tile-link" title="First Car"><span class="tile-name">First Car</span></a>
                </li>
                <li class="tile tile-sporty">
                <a href="/sporty/" class="tile-link" title="Sporty"><span class="tile-name">Sporty</span></a>
                </li>
                <li class="tile tile-adventure">
                <a href="/adventure/" class="tile-link" title="Adventure"><span class="tile-name">Adventure</span></a>
                </li>
                <li class="tile tile-green">
                <a href="/green/" class="tile-link" title="Green"><span class="tile-name">Green</span></a>
                </li>
                <li class="tile tile-indulgence">
                <a href="/indulgence/" class="tile-link" title="Indulgence"><span class="tile-name">Indulgence</span></a>
                </li>
                <li class="tile tile-sedan">
                <a href="/sedan/" class="tile-link" title="Sedans"><span class="tile-name">Sedans</span></a>
                </li>
                <li class="tile tile-trucks">
                <a href="/trucks/" class="tile-link" title="Trucks"><span class="tile-name">Trucks</span></a>
                </li>
                <li class="tile tile-convertible">
                <a href="/convertible/" class="tile-link" title="Convertibles"><span class="tile-name">Convertibles</span></a>
                </li>
                <li class="tile tile-crossover">
                <a href="/crossover/" class="tile-link" title="Crossover"><span class="tile-name">Crossover</span></a>
                </li>
                <li class="tile tile-hatchback">
                <a href="/hatchback/" class="tile-link" title="Hatchbacks"><span class="tile-name">Hatchbacks</span></a>
                </li>
                <li class="tile tile-luxury">
                <a href="/luxury/" class="tile-link" title="Luxury"><span class="tile-name">Luxury</span></a>
                </li>
        </ul>
    </div>

<!-- custome select -->
<div class="mod-filter-make-model">
    <div class="shop-wrapper clearfix">
                    <h2>Already Know What You’re Looking For?</h2>
        <div class="mod-shop-makemodel border-bottom">
            <div class="dropdown-custom">
                <select id = "makes" style="z-index: 10; opacity: 0; width: 170px;">
                        <option value="">Choose Make</option>
                    
                            <?php 
                                foreach( $categories as $category ) {
                                     $name = $category->cat_name;
                                     $slug_tx = $category->slug;
                                     ?>
                                     <option value="<?php echo $name ;?>" data-slug="<?php echo $slug_tx;?>"><?php echo $name ;?></option>
                                     <?php
                                         }

                                     ?>
                </select>
                <span class="dropdown-custom-select" style="width: 118px;">
                <p class="make_top">Choose Make</p>
                </span>
            </div>
<!-- model -->
            <div class="dropdown-custom">
                <select id = "model" style="z-index: 10; opacity: 0; width: 170px;" disabled="disabled">
                                    <option value="">Choose model</option>
                                
                                        
                </select>
                <span class="dropdown-custom-select disabled" style="width: 118px;">
                <p class="model_top">Choose model</p>
            </div>



            <a href="" id= "make_model_go" class="mod-shop-cta btn-main-cta disabled btn-vehicle-dropdown">Go</a>

        </div>
    </div>
</div>



<!-- dynamic make -->
<div class="mod-browse-by-make clearfix">
    <h3>Browse by Vehicle Brand</h3>
    <div class="columns col-4"> 

    <?php 
    $i =0;
    foreach( $categories as $category ) {
            $name = $category->cat_name;
            $slug = $category->slug;
            $i++;
           ?>
           <div>
            <a class="filter-item " href="<?php echo '/'.$slug.'/';?>" title="<?php echo$name;?>"><?php echo $name ;?></a>
           </div>
           
            <?php
            if(($i==17) || ($i==34)){ 
            ?>
                 </div>
                 <div class="columns col-4"> 

            <?php
            }
 

 }?>
 </div>
 <!-- end of for each-->

  </div>
  <!-- dynamic make end -->



</div>
<!--left side-->


    <!--right side -->            
    <div class="right-column right col-18">
            <div class="mod-car-confession clearfix">
                <div class="wrap">
                <h3>Car Confessions</h3>
                <h4>A Pretty Place for Ugly Secrets</h4>
                <a class="btn-alt-cta" href="/confessions/">Confess Here</a>
                </div>
            </div>
            <!-- AdSlot 2 -->        
            <?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="2"]'); ?>
            <!-- End AdSlot 2 -->

            <?php echo do_shortcode( '[stay_connected]' ) ?>

            <!-- AdSlot 3 -->        
            <?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="3"]'); ?>
            <!-- End AdSlot 3 -->
            
            
    </div>
    <!--right side --> 

</div>

<?php get_footer(); ?>  

<script type="text/javascript">
    $(document).ready(function(){ 
         
            var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

            var maketext = "";

              $("#makes").change(function () {
                    $(".make_top").text($('#makes option:selected').text());
                    maketext = $('#makes option:selected').text();
                    makelink = $('#makes option:selected').data('slug');
                    
                    $.ajax({
                        url :ajax_url,
                        type: "POST",
                        data : {
                            action : 'post_love_add_love',
                            name : maketext
                        }, 
                        success: function(data){
                            var models = JSON.parse(data);
                            $.each(models, function( index, value ) {
                              $("#model").append("<option value=" + value.name + " data-slug = "+'"'+ value.slug +'"' + ">" + value.name +"</option>");
                                });

                            $("#make_model_go").removeClass('disabled');
                            $(".dropdown-custom span").removeClass('disabled');
                            $("select#model").removeAttr('disabled');
                             $("a#make_model_go").attr('href',
                                "<?php echo site_url();?>" +'/'+makelink); 
                            
                        }});
                }); 
                var modeltext = "";
                $("#model").change(function () {  
                    $(".model_top").text($('#model option:selected').text());
                    modeltext = $('#model option:selected').text();
                    modellink = $('#model option:selected').data('slug');

                    $("a#make_model_go").attr('href',"<?php echo site_url();?>" +'/'+makelink +'/'+ modellink); 

                }); 


                               

    });

</script>