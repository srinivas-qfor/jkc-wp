<?php
include 'theme-options-social.php';
add_action( 'admin_menu', 'jkc_add_admin_menu' );
add_action( 'admin_init', 'jkc_settings_init' );


function jkc_add_admin_menu(  ) { 
    /*add_submenu_page( 
        'themes.php',   //or 'options.php'
        'Jean Knows Cars - Theme Options',
        'Theme Options',
        'manage_options',
        'jkc-theme-options',
        'jkc_options_page'
    );*/
    add_menu_page(
        'Jean Knows Cars - Theme Options',
        'Theme Options',
        'manage_options',
        'jkc-theme-options',
        'jkc_options_page'
    );
}


function jkc_settings_init(  ) { 

    register_setting( 'jkcThemeOptionPage', 'jkc_settings' );

    add_settings_section(
        'jkc_jkcThemeOptionPage_section_seo', 
        __( 'SEO & Meta', 'jkc' ), 
        'jkc_settings_section_seo_callback', 
        'jkcThemeOptionPage'
    );

    add_settings_field( 
        'seo_domain_verify', 
        __( 'Domain Verify', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionPage', 
        'jkc_jkcThemeOptionPage_section_seo',
        'seo_domain_verify'
    );
}


function jkc_text_field_render($field_name) { 

    $options = get_option( 'jkc_settings' );
    ?>
    <input type='text' name='jkc_settings[<?=$field_name?>]' class='regular-text' value='<?php echo $options[$field_name]; ?>'>
    <?php

}


function jkc_settings_section_seo_callback(  ) { 

    echo __( 'Change default SEO and Meta', 'jkc' );

}


function jkc_options_page(  ) { 

    ?>
    <form action='options.php' method='post'>
        
        <h2>Jean Knows Cars</h2>
        
        <?php
        settings_fields( 'jkcThemeOptionPage' );
        do_settings_sections( 'jkcThemeOptionPage' );
        do_settings_sections( 'jkcThemeOptionSocialPage' );
        submit_button();
        ?>
        
    </form>
    <?php

}
?>