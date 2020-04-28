<?php 


function bc_customize_home($wp_customize){
    // Panel
    $wp_customize->add_panel('bc_site_home_scheme_panel', array(
        'title'    => __('Home Page', 'bc'),
        'description' => '',
        'priority' => 130,
    ));

    // Selection Section
    $wp_customize->add_section('bc_site_home_scheme_selection', array(
        'title'    => __('Hero Type', 'bc'),
        'description' => 'Hero Type',
        'priority' => 130,
        'panel' => 'bc_site_home_scheme_panel',
    ));

    // if (get_theme_mod(''))
    //echo "<pre>";
    // print_r($wp_customize->get_section('bc_site_home_scheme_image'));
    // $wp_customize->get_panel();
    // $res = get_section('bc_site_home_scheme_image');
    /*echo "<pre>";
    print_r($wp_customize->get_panel('bc_site_home_scheme_panel'));
    echo "</pre>";
    die('sss');*/

    // Background Image Section
    $wp_customize->add_section('bc_site_home_scheme_image', array(
        'title'    => __('Background Image', 'bc'),
        'description' => 'Background Image',
        'priority' => 130,
        'panel' => 'bc_site_home_scheme_panel',
    ));
    
    // Image Slider Section
    $wp_customize->add_section('bc_site_home_scheme_slider', array(
        'title'    => __('Image Slider', 'bc'),
        'description' => 'Image Slider',
        'priority' => 130,
        'panel' => 'bc_site_home_scheme_panel',
    ));

    // Video Slider Section
    $wp_customize->add_section('bc_site_home_scheme_video', array(
        'title'    => __('Video Slider', 'bc'),
        'description' => 'Video Slider',
        'priority' => 130,
        'panel' => 'bc_site_home_scheme_panel',
    ));
    

   // Include Hero Type Section
    $filepath_home_hero_type = locate_template( 'inc/theme-customizer/bc-home-hero-type.php' );
    require_once $filepath_home_hero_type;

   // Include Background Image File
    $filepath_home_background_image = locate_template( 'inc/theme-customizer/bc-home-background-image.php' );
    require_once $filepath_home_background_image;

    // Include Video File
    $filepath_home_video = locate_template( 'inc/theme-customizer/bc-home-video.php' );
    require_once $filepath_home_video;

    // Include Image Slider File
    $filepath_home_image_slider = locate_template( 'inc/theme-customizer/bc-home-image-slider.php' );
    require_once $filepath_home_image_slider;


}

add_action('customize_register', 'bc_customize_home');


