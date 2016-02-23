<?php
add_action( 'admin_menu', 'jkc_add_admin_menu_theme_option_social' );
add_action( 'admin_init', 'jkc_settings_social_init' );


function jkc_add_admin_menu_theme_option_social(  ) { 

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


function jkc_settings_social_init(  ) { 

    add_settings_section(
        'jkc_jkcThemeOptionSocialPage_section', 
        __( 'Social Links', 'jkc' ), 
        '', //'jkc_settings_section_callback', 
        'jkcThemeOptionSocialPage'
    );

    add_settings_field( 
        'facebook_url', 
        __( 'Facebook URL', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionSocialPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'facebook_url'
    );

    add_settings_field( 
        'twitter_url', 
        __( 'Twitter URL', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionSocialPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'twitter_url'
    );

    add_settings_field( 
        'googleplus_url', 
        __( 'Google Plus URL', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeSocialOptionPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'googleplus_url'
    );

    add_settings_field( 
        'pinterest_url', 
        __( 'Pinterest URL', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionSocialPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'pinterest_url'
    );

    // fb fields
    add_settings_field( 
        'fb_admins', 
        __( 'FB Admins', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionSocialPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'fb_admins'
    );
    add_settings_field( 
        'fb_app_id', 
        __( 'FB App ID', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionSocialPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'fb_app_id'
    );
    add_settings_field( 
        'fb_page_id', 
        __( 'FB Page ID', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionSocialPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'fb_page_id'
    );
    add_settings_field( 
        'fb_mods', 
        __( 'FB Moderators', 'jkc' ), 
        'jkc_text_field_render', 
        'jkcThemeOptionSocialPage', 
        'jkc_jkcThemeOptionSocialPage_section',
        'fb_mods'
    );

}

function jkc_options_page_social(  ) { 

    ?>
    <form action='options.php' method='post'>
        
        <h2>Jean Knows Cars</h2>
        
        <?php
        settings_fields( 'jkcThemeOptionPage' );
        do_settings_sections( 'jkcThemeOptionSocialPage' );
        submit_button();
        ?>
        
    </form>
    <?php

}
?>