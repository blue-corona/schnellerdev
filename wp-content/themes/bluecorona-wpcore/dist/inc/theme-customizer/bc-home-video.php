<?php 
    //  =======================================
    //  = Hero Type Youtube Video Section  =
    //  =======================================
    
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_url]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_url]', array(
        'label'      => __('Video URL(Youtube,Vimeo, etc)', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_url]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Video Overlay Type       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_overlay_type]', array(
        'default'        => 'solid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_overlay_type]', array(
        'label'      => __('Video Overlay Type', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_overlay_type]',
        'type'       => 'radio',
        'choices'    => array(
            'solid' => 'Solid',
            'gradient' => 'Gradient',
        ),
    ));

    //  =============================
    //  = Video Overlay Color       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_overlay_color]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_overlay_color]', array(
        'label'      => __('Video Overlay Color (rgba)', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_overlay_color]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Start       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_gradient_start]', array(
        'default'        => '0,0,0,0.5',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_gradient_start]', array(
        'label'      => __('Gradient Start', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_gradient_start]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient End       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_gradient_end]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_gradient_end]', array(
        'label'      => __('Gradient End', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_gradient_end]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Rotation       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_gradient_rotation]', array(
        'default'        => '360',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        // 'validate_callback' => 'validate_bc_background_gradient_rotation',
        'sanitize_callback' => 'sanitize_bc_background_gradient_rotation',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_gradient_rotation]', array(
        'label'      => __('Gradient Rotation', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_gradient_rotation]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Video Overlay Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_overlay_text]', array(
        'default'        => "Have an Emergency?<br/>We're here for you24/7!",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_overlay_text]', array(
        'label'      => __('Video Overlay Text', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_overlay_text]',
    ));

    //  =============================
    //  = Button Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_button_text]', array(
        'default'        => "Schedule Service Today<i class='fa fa-circle-right'></i>",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_button_text]', array(
        'label'      => __('Button Text', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_button_text]',
    ));

    //  =============================
    //  = Button Color   =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_button_color]', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[background_video][bc_video_button_color]', array(
        'label'    => __('Button Color', 'bc'),
        'section'  => 'bc_site_home_scheme_video',
        'settings' => 'bc_theme_home_options[background_video][bc_video_button_color]',
    )));

    //  ======================================
    //  = Button Text Color  =
    //  ======================================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_button_text_color]', array(
        'default'           => '#1e73be',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[background_video][bc_video_button_text_color]', array(
        'label'    => __('Button Text Color', 'bc'),
        'section'  => 'bc_site_home_scheme_video',
        'settings' => 'bc_theme_home_options[background_video][bc_video_button_text_color]',
    )));
    
    //  =============================
    //  = Button Link       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_video][bc_video_button_link]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_video][bc_video_button_link]', array(
        'label'      => __('Button Link', 'bc'),
        'section'    => 'bc_site_home_scheme_video',
        'settings'   => 'bc_theme_home_options[background_video][bc_video_button_link]',
        'type'       => 'text',
    ));
