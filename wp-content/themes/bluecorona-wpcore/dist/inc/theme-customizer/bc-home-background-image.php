<?php 
//  =======================================
    //  = Hero Type Background Image Section  =
    //  =======================================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_upload]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bc_theme_home_options[background_image][bc_background_upload]', array(
        'label'    => __('', 'bc'),
        // 'input_attrs'    => array('class' => 'asdasfasdfasd'),
        'section'  => 'bc_site_home_scheme_image',
        'settings' => 'bc_theme_home_options[background_image][bc_background_upload]',
    )));

    //  ==================================
    //  = Image Opacity Background Image =
    //  ==================================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_image_opacity]', array(
        'default'   => '100',
        'sanitize_callback' => 'sanitize_bc_background_image_opacity',
      //  'validate_callback' => 'validate_bc_background_image_opacity',
    ));
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_image_opacity]', array(
        'label' => __('Image Opacity(%)', 'bc'),
        'section'   => 'bc_site_home_scheme_image',
        'type'  => 'number',
        'input_attrs' => array( 'min' => 0, 'max' => 100, 'step'  => 1,'class' => '' )
    ));

    function validate_bc_background_image_opacity($validity, $value){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', __( 'You must supply a valid opacity.' ) );
        } elseif ( $value >100 ) {
            $validity->add( 'required', __( 'Not more than 100.' ) );
        }
        return $validity;
    }
    function sanitize_bc_background_image_opacity($value){
        $value = intval( $value );
            if ( empty( $value ) || ! is_numeric( $value ) ) {
                $value = 100;
            } elseif ( $value >100 ) {
                $value = 100;
            }

        return $value;
    }

    //  =============================
    //  = Image Overlay Type       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_overlay_type]', array(
        'default'        => 'solid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_overlay_type]', array(
        'label'      => __('Image Overlay Type', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_overlay_type]',
        'type'       => 'radio',
        'choices'    => array(
            'solid' => 'Solid',
            'gradient' => 'Gradient',
        ),
    ));

    //  =============================
    //  = Image Overlay Color       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_overlay_solid_color]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_overlay_solid_color]', array(
        'label'      => __('Overlay Color (rgba)', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_overlay_solid_color]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Start       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_gradient_start]', array(
        'default'        => '0,0,0,0.5',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_gradient_start]', array(
        'label'      => __('Gradient Start', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_gradient_start]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient End       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_gradient_end]', array(
        'default'        => '255,255,255,0.2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_gradient_end]', array(
        'label'      => __('Gradient End', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_gradient_end]',
        'type'       => 'text',
    ));

    //  =============================
    //  = Gradient Rotation       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_gradient_rotation]', array(
        'default'        => '360',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        // 'validate_callback' => 'validate_bc_background_gradient_rotation',
        'sanitize_callback' => 'sanitize_bc_background_gradient_rotation',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_gradient_rotation]', array(
        'label'      => __('Gradient Rotation', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_gradient_rotation]',
        'type'       => 'text',
    ));

    function validate_bc_background_gradient_rotation($validity, $value){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', __( 'You must supply a valid Gradient Rotation.' ) );
        } elseif ( $value >360 ) {
            $validity->add( 'required', __( 'Not more than 360.' ) );
        }
        return $validity;
    }
    function sanitize_bc_background_gradient_rotation($value){
        $value = intval( $value );
            if ( empty( $value ) || ! is_numeric( $value ) ) {
                $value = 360;
            } elseif ( $value >360 ) {
                $value = 360;
            }

        return $value;
    }

    //  =============================
    //  = Image Overlay Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_image_overlay_text]', array(
        'default'        => "Have an Emergency?<br/>We're here for you24/7!",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_image_overlay_text]', array(
        'label'      => __('Image Overlay Text', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_image_overlay_text]',
    ));

    //  =============================
    //  = Button Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_button_text]', array(
        'default'        => "Schedule Service Today",
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_button_text]', array(
        'label'      => __('Button Text', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_button_text]',
    ));

    //  =============================
    //  = Button Color   =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_button_color]', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[background_image][bc_background_button_color]', array(
        'label'    => __('Button Color', 'bc'),
        'section'  => 'bc_site_home_scheme_image',
        'settings' => 'bc_theme_home_options[background_image][bc_background_button_color]',
    )));

    //  ======================================
    //  = Button Text Color  =
    //  ======================================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_button_text_color]', array(
        'default'           => '#1e73be',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_home_options[background_image][bc_background_button_text_color]', array(
        'label'    => __('Button Text Color', 'bc'),
        'section'  => 'bc_site_home_scheme_image',
        'settings' => 'bc_theme_home_options[background_image][bc_background_button_text_color]',
    )));
    
    //  =============================
    //  = Button Link       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[background_image][bc_background_button_link]', array(
        'capability'     => 'edit_theme_options',
    ));
 
    $wp_customize->add_control('bc_theme_home_options[background_image][bc_background_button_link]', array(
        'label'      => __('Button Link', 'bc'),
        'section'    => 'bc_site_home_scheme_image',
        'settings'   => 'bc_theme_home_options[background_image][bc_background_button_link]',
        'type'       => 'text',
    ));



