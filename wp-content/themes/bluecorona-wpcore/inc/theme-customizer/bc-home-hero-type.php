<?php 
    
    //  =============================
    //  = Radio Hero Type       =
    //  =============================
    $wp_customize->add_setting('bc_theme_home_options[bc_hero_type]', array(
        'default'        => 'background_image',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_home_hero_type', array(
        'label'      => __('Hero Type', 'bc'),
        'section'    => 'bc_site_home_scheme_selection',
        'settings'   => 'bc_theme_home_options[bc_hero_type]',
        'type'       => 'radio',
        'choices'    => array(
            'background_image' => 'Background Image',
            'image_slider' => 'Image Slider',
            'video' => 'Video',
        ),
    ));
    