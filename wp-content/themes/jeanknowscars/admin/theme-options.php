<?php
include 'theme-options-social.php';
add_action( 'admin_menu', 'jkc_add_admin_menu' );
add_action( 'admin_init', 'jkc_settings_init' );

add_action('admin_head', 'admin_register_head');
function admin_register_head() {
    $url = get_bloginfo('template_directory') . '/assets/css/admin-options.css';  
    echo "<link rel='stylesheet' href='$url' />\n";
}


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

    add_settings_field( 
        'meta_title', 
        __( 'Title', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionPage', 
        'jkc_jkcThemeOptionPage_section_seo',
        'meta_title'
    );

    add_settings_field( 
        'meta_keywords', 
        __( 'Keywords', 'jkc' ), 
        'jkc_textarea_field_render', 
        'jkcThemeOptionPage', 
        'jkc_jkcThemeOptionPage_section_seo',
        'meta_keywords'
    );

    add_settings_field( 
        'meta_description', 
        __( 'Description', 'jkc' ), 
        'jkc_textarea_field_render', 
        'jkcThemeOptionPage', 
        'jkc_jkcThemeOptionPage_section_seo',
        'meta_description'
    );

    add_settings_field( 
        'meta_title_author', 
        __( 'Author Page Title', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionPage', 
        'jkc_jkcThemeOptionPage_section_seo',
        'meta_title_author'
    );

    add_settings_field( 
        'meta_keywords_author', 
        __( 'Author Page Meta Keywords', 'jkc' ), 
        'jkc_textarea_field_render', 
        'jkcThemeOptionPage', 
        'jkc_jkcThemeOptionPage_section_seo',
        'meta_keywords_author'
    );

    add_settings_field( 
        'meta_description_author', 
        __( 'Author Page Meta Description', 'jkc' ), 
        'jkc_textarea_field_render', 
        'jkcThemeOptionPage', 
        'jkc_jkcThemeOptionPage_section_seo',
        'meta_description_author'
    );
}


function jkc_text_field_render($field_name) { 

    $options = get_option( 'jkc_settings' );
    ?>
    <input type='text' name='jkc_settings[<?=$field_name?>]' class='regular-text' value='<?php echo $options[$field_name]; ?>'>
    <?php

}

function jkc_textarea_field_render($field_name) { 

    $options = get_option( 'jkc_settings' );
    ?>
    <textarea name='jkc_settings[<?=$field_name?>]' rows="3" cols="46"><?php echo $options[$field_name]; ?></textarea>
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