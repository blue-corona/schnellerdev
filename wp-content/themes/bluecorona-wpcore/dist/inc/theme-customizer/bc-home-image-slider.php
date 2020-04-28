<?php 
    //  =================================================
    //  = Hero Type Image Slider Section  FOR IMAGE ONE=
    //  =================================================

    //  =============================
    //  = Auto Rotate Slides =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_auto_rotate_slide_one]', array(
        'default'        => 'enabled',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_auto_rotate_slide_one]', array(
        'label'      => __('Auto Rotate Slides', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_auto_rotate_slide_one]',
        'type'       => 'radio',
        'choices'    => array(
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ),
    ));

    //  =============================
    //  = Slide Rotation Timing     =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_slider_rotation_time_one]', array(
        'default'        => '7',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'validate_callback' => 'validate_bc_slider_rotation_time_one',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_slider_rotation_time_one]', array(
        'label'      => __('Slide Rotation Timing', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_slider_rotation_time_one]',
        'type'       => 'text',
    ));

    function validate_bc_slider_rotation_time_one($validity, $value){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', __( 'You must supply a valid Rotation time.' ) );
        } elseif ( $value > 5000 ) {
            $validity->add( 'required', __( 'Not more than 5000.' ) );
        }
        return $validity;
    }


    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_slider_image_one]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_slider_image_one]', array(
        'label'    => __('Image 1 of 3', 'bc'),
        'input_attrs'    => array('class' => 'home_options'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_slider_image_one]',
    )));

    //  ==================================
    //  = Opacity Image Slider =
    //  ==================================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_opacity_one]', array(
        'default'   => '100',
        'sanitize_callback' => 'sanitize_bc_background_image_opacity',
        // 'validate_callback' => 'validate_bc_background_image_opacity',
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_opacity_one]', array(
        'label' => __('Image Opacity(%)', 'bc'),
        'section'   => 'bc_site_home_scheme_slider',
        'type'  => 'number',
        'input_attrs' => array( 'min' => 0, 'max' => 100, 'step'  => 1,'class' => '' )
    ));

    //  =============================
    //  = Image Slider Overlay Type =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_type_one]', array(
        'default'        => 'solid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_type_one]', array(
        'label'      => __('Image Overlay Type', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_type_one]',
        'type'       => 'radio',
        'choices'    => array(
            'solid' => 'Solid',
            'gradient' => 'Gradient',
        ),
    ));

    //  =============================
    //  = Image Overlay Color       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_solid_color_one]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_solid_color_one]', array(
        'label'      => __('Overlay Color (rgba)', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_solid_color_one]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Start       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_start_one]', array(
        'default'        => '0,0,0,0.5',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_start_one]', array(
        'label'      => __('Gradient Start', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_start_one]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient End       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_end_one]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_end_one]', array(
        'label'      => __('Gradient End', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_end_one]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Rotation       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_rotation_one]', array(
        'default'        => '360',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        // 'validate_callback' => 'validate_bc_background_gradient_rotation',
        'sanitize_callback' => 'sanitize_bc_background_gradient_rotation',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_rotation_one]', array(
        'label'      => __('Gradient Rotation', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_rotation_one]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Image Overlay Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_text_one]', array(
        'default'        => "Have an Emergency?<br/>We're here for you24/7!",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_text_one]', array(
        'label'      => __('Image Overlay Text', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_text_one]',
    ));

    //  =============================
    //  = Button Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_text_one]', array(
        'default'        => "Schedule Service Today<i class='fa fa-circle-right'></i>",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_button_text_one]', array(
        'label'      => __('Button Text', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[image_slider][bc_button_text_one]',
    ));

    //  =============================
    //  = Button Color   =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_color_one]', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_button_color_one]', array(
        'label'    => __('Button Color', 'bc'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_button_color_one]',
    )));

    //  ======================================
    //  = Button Text Color  =
    //  ======================================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_text_color_one]', array(
        'default'           => '#1e73be',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_button_text_color_one]', array(
        'label'    => __('Button Text Color', 'bc'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_button_text_color_one]',
    )));
    
    //  =============================
    //  = Button Link       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_link_one]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_button_link_one]', array(
        'label'      => __('Button Link', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_button_link_one]',
        'type'       => 'text',
    ));

    //  =================================================
    //  = Hero Type Image Slider Section  FOR IMAGE TWO=
    //  =================================================

    
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_slider_image_two]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_slider_image_two]', array(
        'label'    => __('Image 2 of 3', 'bc'),
        'input_attrs'    => array('class' => 'asdasfasdfasd'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_slider_image_two]',
    )));

    //  ==================================
    //  = Opacity Image Slider =
    //  ==================================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_opacity_two]', array(
        'default'   => '100',
        'sanitize_callback' => 'sanitize_bc_background_image_opacity',
        // 'validate_callback' => 'validate_bc_background_image_opacity',
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_opacity_two]', array(
        'label' => __('Image Opacity(%)', 'bc'),
        'section'   => 'bc_site_home_scheme_slider',
        'type'  => 'number',
        'input_attrs' => array( 'min' => 0, 'max' => 100, 'step'  => 1,'class' => '' )
    ));

    //  =============================
    //  = Image Slider Overlay Type =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_type_two]', array(
        'default'        => 'solid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_type_two]', array(
        'label'      => __('Image Overlay Type', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_type_two]',
        'type'       => 'radio',
        'choices'    => array(
            'solid' => 'Solid',
            'gradient' => 'Gradient',
        ),
    ));

    //  =============================
    //  = Image Overlay Color       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_solid_color_two]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_solid_color_two]', array(
        'label'      => __('Overlay Color (rgba)', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_solid_color_two]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Start       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_start_two]', array(
        'default'        => '0,0,0,0.5',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_start_two]', array(
        'label'      => __('Gradient Start', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_start_two]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient End       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_end_two]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_end_two]', array(
        'label'      => __('Gradient End', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_end_two]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Rotation       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_rotation_two]', array(
        'default'        => '360',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        // 'validate_callback' => 'validate_bc_background_gradient_rotation',
        'sanitize_callback' => 'sanitize_bc_background_gradient_rotation',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_rotation_two]', array(
        'label'      => __('Gradient Rotation', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_rotation_two]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Image Overlay Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_text_two]', array(
        'default'        => "Have an Emergency?<br/>We're here for you24/7!",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_text_two]', array(
        'label'      => __('Image Overlay Text', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_text_two]',
    ));

    //  =============================
    //  = Button Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_text_two]', array(
        'default'        => "Schedule Service Today<i class='fa fa-circle-right'></i>",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_button_text_two]', array(
        'label'      => __('Button Text', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[image_slider][bc_button_text_two]',
    ));

    //  =============================
    //  = Button Color   =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_color_two]', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_button_color_two]', array(
        'label'    => __('Button Color', 'bc'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_button_color_two]',
    )));

    //  ======================================
    //  = Button Text Color  =
    //  ======================================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_text_color_two]', array(
        'default'           => '#1e73be',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_button_text_color_two]', array(
        'label'    => __('Button Text Color', 'bc'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_button_text_color_two]',
    )));
    
    //  =============================
    //  = Button Link       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_link_two]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_button_link_two]', array(
        'label'      => __('Button Link', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_button_link_two]',
        'type'       => 'text',
    ));


    //  =================================================
    //  = Hero Type Image Slider Section  FOR IMAGE THREE=
    //  =================================================

    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_slider_image_three]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_slider_image_three]', array(
        'label'    => __('Image 3 of 3', 'bc'),
        'input_attrs'    => array('class' => 'asdasfasdfasd'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_slider_image_three]',
    )));

    //  ==================================
    //  = Opacity Image Slider =
    //  ==================================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_opacity_three]', array(
        'default'   => '100',
        'sanitize_callback' => 'sanitize_bc_background_image_opacity',
        // 'validate_callback' => 'validate_bc_background_image_opacity',
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_opacity_three]', array(
        'label' => __('Image Opacity(%)', 'bc'),
        'section'   => 'bc_site_home_scheme_slider',
        'type'  => 'number',
        'input_attrs' => array( 'min' => 0, 'max' => 100, 'step'  => 1,'class' => '' )
    ));

    //  =============================
    //  = Image Slider Overlay Type =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_type_three]', array(
        'default'        => 'solid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_type_three]', array(
        'label'      => __('Image Overlay Type', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_type_three]',
        'type'       => 'radio',
        'choices'    => array(
            'solid' => 'Solid',
            'gradient' => 'Gradient',
        ),
    ));

    //  =============================
    //  = Image Overlay Color       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_solid_color_three]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_solid_color_three]', array(
        'label'      => __('Overlay Color (rgba)', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_solid_color_three]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Start       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_start_three]', array(
        'default'        => '0,0,0,0.5',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_start_three]', array(
        'label'      => __('Gradient Start', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_start_three]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient End       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_end_three]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_end_three]', array(
        'label'      => __('Gradient End', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_end_three]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Rotation       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_gradient_rotation_three]', array(
        'default'        => '360',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        // 'validate_callback' => 'validate_bc_background_gradient_rotation',
        'sanitize_callback' => 'sanitize_bc_background_gradient_rotation',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_gradient_rotation_three]', array(
        'label'      => __('Gradient Rotation', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_gradient_rotation_three]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Image Overlay Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_overlay_text_three]', array(
        'default'        => "Have an Emergency?<br/>We're here for you24/7!",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_overlay_text_three]', array(
        'label'      => __('Image Overlay Text', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[image_slider][bc_overlay_text_three]',
    ));

    //  =============================
    //  = Button Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_text_three]', array(
        'default'        => "Schedule Service Today<i class='fa fa-circle-right'></i>",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_button_text_three]', array(
        'label'      => __('Button Text', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[image_slider][bc_button_text_three]',
    ));

    //  =============================
    //  = Button Color   =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_color_three]', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_button_color_three]', array(
        'label'    => __('Button Color', 'bc'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_button_color_three]',
    )));

    //  ======================================
    //  = Button Text Color  =
    //  ======================================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_text_color_three]', array(
        'default'           => '#1e73be',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[image_slider][bc_button_text_color_three]', array(
        'label'    => __('Button Text Color', 'bc'),
        'section'  => 'bc_site_home_scheme_slider',
        'settings' => 'bc_theme_home_options[image_slider][bc_button_text_color_three]',
    )));
    
    //  =============================
    //  = Button Link       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[image_slider][bc_button_link_three]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[image_slider][bc_button_link_three]', array(
        'label'      => __('Button Link', 'bc'),
        'section'    => 'bc_site_home_scheme_slider',
        'settings'   => 'bc_theme_home_options[image_slider][bc_button_link_three]',
        'type'       => 'text',
    ));
