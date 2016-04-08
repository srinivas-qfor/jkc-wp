<?php
/**
 * The Car Guide Mobile template file
 * @package Jean_Knows_Cars
 */

// stylesheets
wp_enqueue_style( 'mod-tab', get_template_directory_uri() . '/assets/css/mod-tab.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-vehicle-type-mobile', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-make-model-mobile', get_template_directory_uri() . '/assets/css/mod-filter-make-model-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-make-mobile', get_template_directory_uri() . '/assets/css/mod-browse-by-make-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-mrec-mobile', get_template_directory_uri() . '/assets/css/mod-ad-mrec-mobile.css',null,null,"screen" );




// scripts
wp_enqueue_script( 'mod-tab', get_template_directory_uri() . '/assets/js/mod-tab.js',null,null,true);
wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);



include_once 'includes/grid.class.php';
include_once  (ABSPATH .'wp-admin/includes/taxonomy.php');
get_header();

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
     'parent' => 119,
     'exclude' => array(138,146,148,152,154,157,192,167,171,175,176,177,181,182)
    ) );

?>



<!-- title mob-->
<div class="mod-title">
        <h1 class="pagetitle" itemprop="name">Car Guide</h1>
        <div class="desc">Somewhere in here, you will find your dream car.</div>
</div>

<!-- browse vehile type-->
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
        <div class="border-bottom">
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
                <span class="dropdown-custom-select mk" style="width: 118px;">
                <p class="make_top">Choose Make</p>
                </span>
            </div>
<!-- model -->
            <div class="dropdown-custom">
                <select id = "model" style="z-index: 10; opacity: 0; width: 170px;" disabled="disabled">
                                    <option value="">Choose model</option>
                                
                                        
                </select>
                <span class="dropdown-custom-select disabled md" style="width: 118px;">
                <p class="model_top">Choose model</p>
            </div>

            <div style="clear: both; height:1px;">&nbsp;</div>
            
            <a href="" id= "make_model_go" class="mod-shop-cta btn-main-cta disabled btn-vehicle-dropdown">Go</a>
           


        </div>
    </div>
</div>
<!-- custome select end -->

<!-- dynamic make -->
<div class="mod-browse-by-make-mobile clearfix">
    <h3>Browse by Vehicle Brand</h3>
    <div class="columns col-6"> 

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
            if(($i % 25) == 0){ 
            ?>
                 </div>
                 <div class="columns col-6"> 

            <?php
            }
 

 }?>
 </div>
 <!-- end of for each-->

  </div>
  <!-- dynamic make end -->


<?php 

echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="2"]'); 
 
 get_footer();


?>

<script type="text/javascript">
    $(document).ready(function(){ 
         
            var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

            var maketext = "";

              $("#makes").change(function () {
                    $("select#model").html('');
                    $(".model_top").text('Choose model');
                    $("#model").append('<option value="">Choose model</option>');
                    
                    $(".make_top").text($('#makes option:selected').text());
                    maketext = $('#makes option:selected').text();
                    makelink = $('#makes option:selected').data('slug');
                    
                    $.ajax({
                        url :ajax_url,
                        type: "POST",
                        data : {
                            action : 'post_make_model',
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