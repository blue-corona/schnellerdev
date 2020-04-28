<?php
    /* Font Family*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_font_family]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_theme_a_configuration[a_font_family]', array(
        'label'      => __('Font Family', 'bc'),
        'section'    => 'bc_site_font_a_scheme',
        'type'           => 'text',
        'settings'   => 'bc_theme_a_configuration[a_font_family]',
    ));

    /* Font Size Unit*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_font_size_unit]', array(
        'default'        => 'px',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_theme_a_configuration[a_font_size_unit]', array(
        'label'      => __('Font Size Unit', 'bc'),
        'section'    => 'bc_site_font_a_scheme',
        'type'           => 'radio',
        'choices'   => ['px'=>'px','pt'=>'pt','em'=>'em','rem'=>'rem'],
        'settings'   => 'bc_theme_a_configuration[a_font_size_unit]',
    ));

    /* Font Size*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_font_size]', array(
        'default'        => '12',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_theme_a_configuration[a_font_size]', array(
        'label'      => __('Font Size', 'bc'),
        'section'    => 'bc_site_font_a_scheme',
        'type'           => 'number',
        'settings'   => 'bc_theme_a_configuration[a_font_size]',
    ));

    /* Font Style*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_font_style]', array(
        'default'           => 'italic',
        'capability'     => 'edit_theme_options',
    ));
    
    $wp_customize->add_control( 'bc_theme_a_configuration[a_font_style]',
        array(
            'section' => 'bc_site_font_a_scheme',
            'label'   => __( 'Font Style', 'bc' ),
            'type'     => 'radio',
            'choices' => array(
                'normal'      => __( 'Normal',      'bc' ),
                'italic'      => __( 'Italic',      'bc' ),
                'oblique'     => __( 'Oblique',     'bc' ),
            )
        )
    );

    /* Font Color*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_color]', array(
        'default'           => '#393d3f',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_a_configuration[a_color]', array(
        'label'    => __('Color', 'bc'),
        'section'  => 'bc_site_font_a_scheme',
        'settings' => 'bc_theme_a_configuration[a_color]',
    )));

    /* Font Weight*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_font_weight]', array(
        'default'        => '100',
        'capability'     => 'edit_theme_options',
    ));
  
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,'bc_theme_a_configuration[a_font_weight]',array(
                'label'      => __( 'Weight', 'bc' ),
                // 'description' => __( '' ),
                'settings'   => 'bc_theme_a_configuration[a_font_weight]',
                'section'    => 'bc_site_font_a_scheme',
                'type'    => 'select',
                'choices' => array(
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '500' => '500',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                )
            )
        ));


    /* Font Letter Spacing*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_letter_spacing]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_theme_a_configuration[a_letter_spacing]', array(
        'label'      => __('Letter Spacing (In pixel)', 'bc'),
        'section'    => 'bc_site_font_a_scheme',
        'type'           => 'number',
        'settings'   => 'bc_theme_a_configuration[a_letter_spacing]',
    ));

    /* Font Line Height*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_line_height]', array(
        'default'        => '28',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_theme_a_configuration[a_line_height]', array(
        'label'      => __('Line Height (In pixel)', 'bc'),
        'section'    => 'bc_site_font_a_scheme',
        'type'           => 'number',
        'settings'   => 'bc_theme_a_configuration[a_line_height]',
    ));

    /* Font Text Decoration*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_text_decoration]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bc_sanitize_font_family',
    ));
    $wp_customize->add_control( new BC_Customize_Control_Checkbox_Multiple( $wp_customize,
            'bc_theme_a_configuration[a_text_decoration]',
            array(
                'section' => 'bc_site_font_a_scheme',
                'label'   => __( 'Text Decoration', 'bc' ),
                'choices' => array(
                    'underline'      => __( 'Underline',      'bc' ),
                )
            )
        )
    );

    /* Font Hover Decoration*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_hover_decoration]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bc_sanitize_font_family',
    ));
    $wp_customize->add_control( new BC_Customize_Control_Checkbox_Multiple( $wp_customize,
            'bc_theme_a_configuration[a_hover_decoration]',
            array(
                'section' => 'bc_site_font_a_scheme',
                'label'   => __( 'Hover Decoration', 'bc' ),
                'choices' => array(
                    'underline'      => __( 'Underline',      'bc' ),
                )
            )
        )
    );


    /* Hover Color*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_hover_color]', array(
        'default'           => '#393d3f',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_a_configuration[a_hover_color]', array(
        'label'    => __('Hover Color', 'bc'),
        'section'  => 'bc_site_font_a_scheme',
        'settings' => 'bc_theme_a_configuration[a_hover_color]',
    )));

    /* Hover Background*/
    $wp_customize->add_setting('bc_theme_a_configuration[a_hover_background_color]', array(
        'default'           => '#393d3f',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_a_configuration[a_hover_background_color]', array(
        'label'    => __('Hover Background', 'bc'),
        'section'  => 'bc_site_font_a_scheme',
        'settings' => 'bc_theme_a_configuration[a_hover_background_color]',
    )));

