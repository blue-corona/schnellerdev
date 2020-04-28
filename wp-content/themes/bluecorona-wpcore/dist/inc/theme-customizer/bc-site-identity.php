<?php 
function bc_customize_register($wp_customize){
    
    $wp_customize->add_section('bc_site_branding_scheme', array(
        'title'    => __('Site Info / Branding', 'bc'),
        'description' => '',
        'priority' => 100,
    ));

    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_logo_upload]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bc_logo_upload', array(
        'label'    => __('Logo', 'bc'),
        'section'  => 'bc_site_branding_scheme',
        'settings' => 'bc_theme_options[bc_logo_upload]',
    )));

    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_max_width]', array(
        'default'        => '250',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
    $wp_customize->add_control('bc_max_width', array(
        'label'      => __('Logo - Max Width', 'bc'),
        'section'    => 'bc_site_branding_scheme',
        'settings'   => 'bc_theme_options[bc_max_width]',
    ));
 
    
    //  =============================
    //  = Radio Input location       =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_logo_location]', array(
        'default'        => 'left',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('bc_site_branding_scheme', array(
        'label'      => __('Logo - Location', 'bc'),
        'section'    => 'bc_site_branding_scheme',
        'settings'   => 'bc_theme_options[bc_logo_location]',
        'type'       => 'radio',
        'choices'    => array(
            'left' => 'Left',
            'center' => 'Center',
        ),
    ));

    //  =============================
    //  = Favicon Upload             =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_favicon_upload]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bc_favicon_upload', array(
        'label'    => __('Favicon', 'bc'),
        'section'  => 'bc_site_branding_scheme',
        'settings' => 'bc_theme_options[bc_favicon_upload]',
    )));
 
    
 
    //  =============================
    //  = Color Picker Button        =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_button_color]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_button_color', array(
        'label'    => __('Site Button Color', 'bc'),
        'section'  => 'bc_site_branding_scheme',
        'settings' => 'bc_theme_options[bc_button_color]',
    )));

    //  =============================
    //  = Color Picker Button Text        =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_button_text_color]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_button_text_color', array(
        'label'    => __('Site Button Text Color', 'bc'),
        'section'  => 'bc_site_branding_scheme',
        'settings' => 'bc_theme_options[bc_button_text_color]',
    )));

    //  ===================================
    //  = Color Picker Button Hover =
    //  ===================================
    $wp_customize->add_setting('bc_theme_options[bc_button_hover_color]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_button_hover_color', array(
        'label'    => __('Site Button Hover Color', 'bc'),
        'section'  => 'bc_site_branding_scheme',
        'settings' => 'bc_theme_options[bc_button_hover_color]',
    )));

    //  ===================================
    //  = Color Picker Button Text Hover =
    //  ===================================
    $wp_customize->add_setting('bc_theme_options[bc_button_text_hover_color]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bc_button_text_hover_color', array(
        'label'    => __('Site Button Text Hover Color', 'bc'),
        'section'  => 'bc_site_branding_scheme',
        'settings' => 'bc_theme_options[bc_button_text_hover_color]',
    )));

    //  =============================
    //  = Text Address               =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_address]', array(
        'default'        => '123 Main St. Charlotte, NC 28202',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_address_site', array(
        'label'      => __('Address', 'bc'),
        'section'    => 'bc_site_branding_scheme',
        'type'           => 'textarea',
        'settings'   => 'bc_theme_options[bc_address]',
    ));

    //  =============================
    //  = Text Phone               =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_phone]', array(
        'default'        => '(800)123-4567',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_phone', array(
        'label'      => __('Phone # (Find & Replace #)', 'bc'),
        'section'    => 'bc_site_branding_scheme',
        'type'           => 'text',
        'settings'   => 'bc_theme_options[bc_phone]',
    ));

    //  =============================
    //  = License =
    //  =============================
    $wp_customize->add_setting('bc_theme_options[bc_license]', array(
        'default'        => 'CO5084924',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_license_site', array(
        'label'      => __('License #', 'bc'),
        'section'    => 'bc_site_branding_scheme',
        'type'           => 'text',
        'settings'   => 'bc_theme_options[bc_license]',
    ));
 
 
 //    //  =============================
 //    //  = Page Dropdown             =
 //    //  =============================
 //    $wp_customize->add_setting('bc_theme_options[page_test]', array(
 //        'capability'     => 'edit_theme_options',
 //        'type'           => 'option',
 
 //    ));
 
 //    $wp_customize->add_control('bc_page_test', array(
 //        'label'      => __('Page Test', 'bc'),
 //        'section'    => 'bc_site_branding_scheme',
 //        'type'    => 'dropdown-pages',
 //        'settings'   => 'bc_theme_options[page_test]',
 //    ));

 //    // =====================
 //    //  = Category Dropdown =
 //    //  =====================
 //    $categories = get_categories();
	// $cats = array();
	// $i = 0;
	// foreach($categories as $category){
	// 	if($i==0){
	// 		$default = $category->slug;
	// 		$i++;
	// 	}
	// 	$cats[$category->slug] = $category->name;
	// }
 
	// $wp_customize->add_setting('_s_f_slide_cat', array(
	// 	'default'        => $default
	// ));
	// $wp_customize->add_control( 'cat_select_box', array(
	// 	'settings' => '_s_f_slide_cat',
	// 	'label'   => 'Select Category:',
	// 	'section'  => '_s_f_home_slider',
	// 	'type'    => 'select',
	// 	'choices' => $cats,
	// ));

	// //  =============================
 //    //  = Checkbox                  =
 //    //  =============================
 //    $wp_customize->add_setting('bc_theme_options[checkbox_test]', array(
 //        'capability' => 'edit_theme_options',
 //        'type'       => 'option',
 //    ));
 
 //    $wp_customize->add_control('display_header_text', array(
 //        'settings' => 'bc_theme_options[checkbox_test]',
 //        'label'    => __('Display Header Text'),
 //        'section'  => 'bc_site_branding_scheme',
 //        'type'     => 'checkbox',
 //    ));
 
 
 //    //  =============================
 //    //  = Select Box                =
 //    //  =============================
 //     $wp_customize->add_setting('bc_theme_options[header_select]', array(
 //        'default'        => 'value2',
 //        'capability'     => 'edit_theme_options',
 //        'type'           => 'option',
 
 //    ));
 //    $wp_customize->add_control( 'example_select_box', array(
 //        'settings' => 'bc_theme_options[header_select]',
 //        'label'   => 'Select Something:',
 //        'section' => 'bc_site_branding_scheme',
 //        'type'    => 'select',
 //        'choices'    => array(
 //            'value1' => 'Choice 1',
 //            'value2' => 'Choice 2',
 //            'value3' => 'Choice 3',
 //        ),
 //    ));
 
 
    
 
 
    //  =============================
    //  = File Upload               =
    //  =============================
    // $wp_customize->add_setting('bc_theme_options[upload_test]', array(
    //     'default'           => 'arse',
    //     'capability'        => 'edit_theme_options',
    //     'type'           => 'option',
 
    // ));
 
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
    //     'label'    => __('Upload Test', 'bc'),
    //     'section'  => 'bc_site_branding_scheme',
    //     'settings' => 'bc_theme_options[upload_test]',
    // )));
 
}
 
add_action('customize_register', 'bc_customize_register');
