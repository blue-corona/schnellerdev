<?php 


function bc_customize_font($wp_customize){
    // Panel
    $wp_customize->add_panel('bc_site_font_scheme_panel', array(
        'title'    => __('Fonts', 'bc'),
        'description' => '',
        'priority' => 130,
    ));

    // H1 Section
    $wp_customize->add_section('bc_site_font_h1_scheme', array(
        'title'    => __('H1', 'bc'),
        'description' => 'H1 Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));
    
    // H2 Section
    $wp_customize->add_section('bc_site_font_h2_scheme', array(
        'title'    => __('H2', 'bc'),
        'description' => 'H2 Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));
    
    // H3 Section
    $wp_customize->add_section('bc_site_font_h3_scheme', array(
        'title'    => __('H3', 'bc'),
        'description' => 'H3 Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));

    // H4 Section
    $wp_customize->add_section('bc_site_font_h4_scheme', array(
        'title'    => __('H4', 'bc'),
        'description' => 'H4 Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));

    // H5 Section
    $wp_customize->add_section('bc_site_font_h5_scheme', array(
        'title'    => __('H5', 'bc'),
        'description' => 'H5 Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));
    
    // H6 Section
    $wp_customize->add_section('bc_site_font_h6_scheme', array(
        'title'    => __('H6', 'bc'),
        'description' => 'H6 Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));

    // P Section
    $wp_customize->add_section('bc_site_font_p_scheme', array(
        'title'    => __('P', 'bc'),
        'description' => 'P Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));

    // A Section
    $wp_customize->add_section('bc_site_font_a_scheme', array(
        'title'    => __('Hyperlinks', 'bc'),
        'description' => 'Hyperlinks Font Family',
        'priority' => 130,
        'panel' => 'bc_site_font_scheme_panel',
    ));

    // Include H1 File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-h1.php' );
    require_once $filepath_font_family;

    // Include H2 File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-h2.php' );
    require_once $filepath_font_family;

    // Include H3 File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-h3.php' );
    require_once $filepath_font_family;

    // Include H4 File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-h4.php' );
    require_once $filepath_font_family;

    // Include H5 File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-h5.php' );
    require_once $filepath_font_family;

    // Include H6 File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-h6.php' );
    require_once $filepath_font_family;

    // Include P File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-p.php' );
    require_once $filepath_font_family;

    // Include A File
    $filepath_font_family = locate_template( 'inc/theme-customizer/bc-font-a.php' );
    require_once $filepath_font_family;

}

add_action('customize_register', 'bc_customize_font');

add_action( 'wp_head', 'font_style');
function font_style($wp_customize){
    $theme_h1_configuration = get_theme_mod('bc_theme_h1_configuration');
    $theme_h2_configuration = get_theme_mod('bc_theme_h2_configuration');
    $theme_h3_configuration = get_theme_mod('bc_theme_h3_configuration');
    $theme_h4_configuration = get_theme_mod('bc_theme_h4_configuration');
    $theme_h5_configuration = get_theme_mod('bc_theme_h5_configuration');
    $theme_h6_configuration = get_theme_mod('bc_theme_h6_configuration');
    $theme_p_configuration = get_theme_mod('bc_theme_p_configuration');
    $theme_a_configuration = get_theme_mod('bc_theme_a_configuration');
?>
<style type="text/css">
h1{<?php echo generate_font_settings('h1');?>;text-decoration: <?php if(isset($theme_h1_configuration['h1_text_decoration'][0]) && !empty($theme_h1_configuration['h1_text_decoration'][0])){ echo $theme_h1_configuration['h1_text_decoration'][0];}else{ echo 'none'; }?>}
h2{<?php echo generate_font_settings('h2');?>;text-decoration: <?php if(isset($theme_h2_configuration['h2_text_decoration'][0]) && !empty($theme_h2_configuration['h2_text_decoration'][0])){ echo $theme_h2_configuration['h2_text_decoration'][0];}else{ echo 'none'; }?>}
h3{<?php echo generate_font_settings('h3');?>;text-decoration: <?php if(isset($theme_h3_configuration['h3_text_decoration'][0]) && !empty($theme_h3_configuration['h3_text_decoration'][0])){ echo $theme_h3_configuration['h3_text_decoration'][0];}else{ echo 'none'; }?>}
h4{<?php echo generate_font_settings('h4');?>;text-decoration: <?php if(isset($theme_h4_configuration['h4_text_decoration'][0]) && !empty($theme_h4_configuration['h4_text_decoration'][0])){ echo $theme_h4_configuration['h4_text_decoration'][0];}else{ echo 'none'; }?>}
h5{<?php echo generate_font_settings('h5');?>;text-decoration: <?php if(isset($theme_h5_configuration['h5_text_decoration'][0]) && !empty($theme_h5_configuration['h5_text_decoration'][0])){ echo $theme_h5_configuration['h5_text_decoration'][0];}else{ echo 'none'; }?>}
h6{<?php echo generate_font_settings('h6');?>;text-decoration: <?php if(isset($theme_h6_configuration['h6_text_decoration'][0]) && !empty($theme_h6_configuration['h6_text_decoration'][0])){ echo $theme_h6_configuration['h6_text_decoration'][0];}else{ echo 'none'; }?>}
p{<?php echo generate_font_settings('p');?>;text-decoration: <?php if(isset($theme_p_configuration['p_text_decoration'][0]) && !empty($theme_p_configuration['p_text_decoration'][0])){ echo $theme_p_configuration['p_text_decoration'][0];}else{ echo 'none'; }?>}
body a{<?php echo generate_font_settings('a');?>;text-decoration: <?php if(isset($theme_a_configuration['a_text_decoration'][0]) && !empty($theme_a_configuration['a_text_decoration'][0])){ echo $theme_a_configuration['a_text_decoration'][0];}else{ echo 'none'; }?>}
body a:hover{<?php echo 'color:'.bc_get_theme_mod('bc_theme_a_configuration', 'a_hover_color','', false).';';?>;text-decoration: <?php if(isset($theme_a_configuration['a_hover_decoration'][0]) && !empty($theme_a_configuration['a_hover_decoration'][0])){ echo $theme_a_configuration['a_hover_decoration'][0];}else{ echo 'none'; }?>}
</style>
<?php
}

// Function to generate font styling dynamic for different tags
function generate_font_settings($tag) {
$setting = 'font-family:'.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_font_family','', 'Roboto').'; 
    font-size:'.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_font_size','', '48').bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_font_size_unit','', 'px').';
    letter-spacing:'.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_letter_spacing','', '0').'px;
    font-weight:'.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_font_weight','', '700').';
    line-height:'.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_line_height','', '48').'px;
    font-style:'.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_font_style','', 'normal').';
    color:'.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_color','', '#00395e').';
    '.bc_get_theme_mod('bc_theme_'.$tag.'_configuration', $tag.'_additional_css','', '');
    return $setting;
}