<?php
    /* Global Tracking */
    $wp_customize->add_setting('bc_site_global_settings[google_tag_manager_id]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_site_global_settings[google_tag_manager_id]', array(
        'label'      => __('Google Tag Manager Id', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'           => 'text',
        'settings'   => 'bc_site_global_settings[google_tag_manager_id]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[google_analytics_ads]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_site_global_settings[google_analytics_ads]', array(
        'label'      => __('Google Analytics and Google Ads', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'       => 'textarea',
        'settings'   => 'bc_site_global_settings[google_analytics_ads]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[call_tracking_code]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_site_global_settings[call_tracking_code]', array(
        'label'      => __('Call Tracking Code (in <head>)', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'       => 'textarea',
        'settings'   => 'bc_site_global_settings[call_tracking_code]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[google_search_console]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_site_global_settings[google_search_console]', array(
        'label'      => __('Google Search Console', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'           => 'text',
        'settings'   => 'bc_site_global_settings[google_search_console]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[bing_uet_tag]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_site_global_settings[bing_uet_tag]', array(
        'label'      => __('Bing UET Tag', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'           => 'text',
        'settings'   => 'bc_site_global_settings[bing_uet_tag]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[facebook_pixel]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_site_global_settings[facebook_pixel]', array(
        'label'      => __('Facebook Pixel', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'           => 'text',
        'settings'   => 'bc_site_global_settings[facebook_pixel]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[linkedin_insight_tag]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('bc_site_global_settings[linkedin_insight_tag]', array(
        'label'      => __('LinkedIn Insight Tag', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'           => 'text',
        'settings'   => 'bc_site_global_settings[linkedin_insight_tag]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[additional_header_script]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_site_global_settings[additional_header_script]', array(
        'label'      => __('Additional Header Scripts', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'       => 'textarea',
        'settings'   => 'bc_site_global_settings[additional_header_script]',
    ));

    $wp_customize->add_setting('bc_site_global_settings[additional_footer_script]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_site_global_settings[additional_footer_script]', array(
        'label'      => __('Additional Footer Scripts', 'bc'),
        'section'    => 'bc_site_global_scheme',
        'type'       => 'textarea',
        'settings'   => 'bc_site_global_settings[additional_footer_script]',
    ));