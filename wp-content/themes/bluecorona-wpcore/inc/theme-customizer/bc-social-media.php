<?php 
function bc_customize_social_media($wp_customize){
    
    $wp_customize->add_section('bc_site_social_media_scheme', array(
        'title'    => __('Social Media', 'bc'),
        'description' => 'Shortcode: [social-icons]',
        'priority' => 150,
    ));

    //  =============================
    //  = Color Picker Social Icon  =
    //  =============================
    $wp_customize->add_setting('bc_theme_social_media[bc_social_icon_color]', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_social_icon_color', array(
        'label'    => __('Icon Color', 'bc'),
        'section'  => 'bc_site_social_media_scheme',
        'settings' => 'bc_theme_social_media[bc_social_icon_color]',
    )));

    //  ======================================
    //  = Color Picker Social Icon Hover  =
    //  ======================================
    $wp_customize->add_setting('bc_theme_social_media[bc_social_icon_hover_color]', array(
        'default'           => '#1e73be',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_social_icon_hover_color', array(
        'label'    => __('Hover Color', 'bc'),
        'section'  => 'bc_site_social_media_scheme',
        'settings' => 'bc_theme_social_media[bc_social_icon_hover_color]',
    )));


    // Add our Sortable Repeater setting and Custom Control for Social media URLs
    $wp_customize->add_setting( 'bc_theme_social_media[bc_social_media]',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'type'       => 'theme_mod',
        )
    );

    $wp_customize->add_control( new BlueCorona_Sortable_Repeater_Custom_Control( $wp_customize, 'bc_theme_social_media[bc_social_media]',
        array(
            'label' => 'Custom Social Media',
            'section' => 'bc_site_social_media_scheme',
            'settings' => 'bc_theme_social_media[bc_social_media]',
        )
    ) );
}

add_action('customize_register', 'bc_customize_social_media');

