<?php
    /* Global Tracking */
    $wp_customize->add_setting('bc_site_chat_settings[chat_code]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_site_chat_settings[chat_code]', array(
        'label'      => __('Chat Code', 'bc'),
        'section'    => 'bc_site_chat_scheme',
        'type'       => 'textarea',
        'settings'   => 'bc_site_chat_settings[chat_code]',
    ));

    $wp_customize->add_setting('bc_site_chat_settings[chat_completed]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control('bc_site_chat_settings[chat_completed]', array(
        'label'      => __('Chat Completed Pixels (js)', 'bc'),
        'section'    => 'bc_site_chat_scheme',
        'type'       => 'textarea',
        'settings'   => 'bc_site_chat_settings[chat_completed]',
    ));

