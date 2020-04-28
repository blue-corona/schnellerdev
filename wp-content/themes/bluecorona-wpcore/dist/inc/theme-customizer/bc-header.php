<?php 
function bc_customize_header($wp_customize){
    
    $wp_customize->add_section('bc_header_scheme', array(
        'title'    => __('Header', 'bc'),
        'description' => '',
        'priority' => 120,
    ));

    //  =============================
    //  = Radio Header Type       =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[header][type]', array(
        'default'        => 'fixed',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_options[header][type]', array(
        'label'      => __('Header Type', 'bc'),
        'section'    => 'bc_header_scheme',
        'settings'   => 'bc_theme_options[header][type]',
        'type'       => 'radio',
        'choices'    => array(
            'fixed' => 'Fixed',
            'default' => 'Default',
        ),
    ));

    //  =============================
    //  = Radio Announcement bar    =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[header][announcement_bar]', array(
        'default'        => 'enabled',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_options[header][announcement_bar]', array(
        'label'      => __('Announcement bar', 'bc'),
        'section'    => 'bc_header_scheme',
        'settings'   => 'bc_theme_options[header][announcement_bar]',
        'type'       => 'radio',
        'choices'    => array(
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ),
    ));

    //  ===============================
    //  = Color Picker Bar Background =
    //  ===============================
    $wp_customize->add_setting('bc_theme_options[header][announcement_bar_bg]', array(
        'default'           => '#253e91',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_options[header][announcement_bar_bg]', array(
        'label'    => __('Announcement bar background', 'bc'),
        'section'  => 'bc_header_scheme',
        'settings' => 'bc_theme_options[header][announcement_bar_bg]',
    )));

    //  ======================================
    //  = Color Picker Announcement Bar Text =
    //  ======================================
    $wp_customize->add_setting('bc_theme_options[header][announcement_bar_text_color]', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_theme_options[header][announcement_bar_text_color]', array(
        'label'    => __('Announcement bar text', 'bc'),
        'section'  => 'bc_header_scheme',
        'settings' => 'bc_theme_options[header][announcement_bar_text_color]',
    )));


    //  =======================================
    //  = Text Announcement bar content       =
    //  =======================================
    $wp_customize->add_setting('bc_theme_options[header][announcement_bar_content]', array(
        'default'        => '123 Main St. Charlotte, NC 28202',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_theme_options[header][announcement_bar_content]', array(
        'label'      => __('Announcement bar content', 'bc'),
        'section'    => 'bc_header_scheme',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_options[header][announcement_bar_content]',
    ));

    //  =============================
    //  = Radio Search bar          =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[header][search_bar]', array(
        'default'        => 'enabled',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_theme_options[header][search_bar]', array(
        'label'      => __('Search bar', 'bc'),
        'section'    => 'bc_header_scheme',
        'settings'   => 'bc_theme_options[header][search_bar]',
        'type'       => 'radio',
        'choices'    => array(
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ),
    ));
}

add_action('customize_register', 'bc_customize_header');

add_action( 'wp_head', 'header_style');
function header_style($wp_customize){
?>
<style type="text/css">
.bc_announcement_bar { background-color:<?php echo bc_get_theme_mod('bc_theme_options', 'header','announcement_bar_bg', '#01385e');?>;}
.bc_announcement_bar_text a{color:<?php echo bc_get_theme_mod('bc_theme_options', 'header','announcement_bar_text_color', '#ffffff');?>;}
.bc_announcement_bar_text a:hover{color:<?php echo bc_get_theme_mod('bc_theme_options', 'header','announcement_bar_text_color', '#ffffff');?>;background: none;text-decoration:none;}
</style>
<?php
}
