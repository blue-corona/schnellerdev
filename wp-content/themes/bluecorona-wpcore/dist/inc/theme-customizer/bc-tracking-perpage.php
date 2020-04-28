<?php
    /* Global Tracking */
$wp_customize->add_setting( 'bc_site_perpage_scheme[per_page_code]',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'capability' => 'edit_theme_options',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control( new BlueCorona_Tracking_Control( $wp_customize, 'bc_site_perpage_scheme[per_page_code]',
    array(
        'label' => 'Custom Social Media',
        'section' => 'bc_site_perpage_scheme',
        'settings' => 'bc_site_perpage_scheme[per_page_code]',
    )
) );
