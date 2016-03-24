<?php
add_action( 'admin_menu', 'jkc_add_admin_menu_theme_option_pagi_meta' );
add_action( 'admin_init', 'jkc_settings_pagi_meta_init' );


function jkc_add_admin_menu_theme_option_pagi_meta(  ) { 

    /*
    add_submenu_page( 
        'jkc-theme-options',   //or 'options.php'
        'Jean Knows Cars - Theme Options',
        'Social',
        'manage_options',
        'jkc-theme-options-social',
        'jkc_options_page_social'
    );
    */
}


function jkc_settings_pagi_meta_init(  ) { 

    add_settings_section(
        'jkc_jkcThemeOptionPagiMetaPage_section', 
        __( 'Pagination Custom SEO Meta Settings', 'jkc' ), 
        'jkc_settings_pagi_meta_section_callback', 
        'jkcThemeOptionPagiMetaPage'
    );

    add_settings_field( 
        'meta_title_make_mode_pagi', 
        __( 'Make Model Pagination Title', 'jkc' ), 
        'jkc_textarea_field_render', 
        'jkcThemeOptionPagiMetaPage', 
        'jkc_jkcThemeOptionPagiMetaPage_section',
        'meta_title_make_mode_pagi'
    );

    add_settings_field( 
        'meta_keywords_make_mode_pagi', 
        __( 'Make Model Pagination Keywords', 'jkc' ), 
        'jkc_textarea_field_render', 
        'jkcThemeOptionPagiMetaPage', 
        'jkc_jkcThemeOptionPagiMetaPage_section',
        'meta_keywords_make_mode_pagi'
    );

    add_settings_field( 
        'meta_description_make_mode_pagi', 
        __( 'Make Model Pagination Description', 'jkc' ), 
        'jkc_textarea_field_render', 
        'jkcThemeOptionPagiMetaPage', 
        'jkc_jkcThemeOptionPagiMetaPage_section',
        'meta_description_make_mode_pagi'
    );

}

function jkc_settings_pagi_meta_section_callback() {
    echo __( '<strong>Available closures to use (All names to enclosed [[[ ]]]</strong>) <br />', 'jkc' );
    echo __( 'current_year, last_year, next_year, vehicle_model, vehicle_make, site_name, page_num <br />', 'jkc' );
    echo __( 'Ex: [[[vehicleModel]]]', 'jkc' );
}
?>