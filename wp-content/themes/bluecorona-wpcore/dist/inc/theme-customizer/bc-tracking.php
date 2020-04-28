<?php 
function bc_customize_tracking($wp_customize){
    // Panel
    $wp_customize->add_panel('bc_site_tracking_scheme_panel', array(
        'title'    => __('Tracking Setup', 'bc'),
        'description' => '',
        'priority' => 130,
    ));

    // Global Section
    $wp_customize->add_section('bc_site_global_scheme', array(
        'title'    => __('Global', 'bc'),
        'description' => 'Global Settings',
        'priority' => 130,
        'panel' => 'bc_site_tracking_scheme_panel',
    ));
    
    // Per Page Section
    $wp_customize->add_section('bc_site_perpage_scheme', array(
        'title'    => __('Per Page', 'bc'),
        'description' => 'Per Page',
        'priority' => 130,
        'panel' => 'bc_site_tracking_scheme_panel',
    ));
    
    // BC Chart Section
    $wp_customize->add_section('bc_site_chat_scheme', array(
        'title'    => __('BC Chat', 'bc'),
        'description' => '*Will be inserted at the </body> tag inside footer.php',
        'priority' => 130,
        'panel' => 'bc_site_tracking_scheme_panel',
    ));

    // Include Global Section File
    $filepath_tracking = locate_template( 'inc/theme-customizer/bc-tracking-global.php' );
    require_once $filepath_tracking;

    // Include Per Page File
    $filepath_tracking = locate_template( 'inc/theme-customizer/bc-tracking-perpage.php' );
    require_once $filepath_tracking;

    // Include BC Chat File
    $filepath_tracking = locate_template( 'inc/theme-customizer/bc-tracking-chat.php' );
    require_once $filepath_tracking;

}
add_action('customize_register', 'bc_customize_tracking');


add_action( 'wp_head', 'global_settings_header',999);
function global_settings_header($wp_customize){
?>
<script type="text/javascript">
<?php echo bc_get_theme_mod('bc_site_global_settings', 'google_tag_manager_id',false, false);?>
<?php echo bc_get_theme_mod('bc_site_global_settings', 'bing_uet_tag',false, false);?>
<?php echo bc_get_theme_mod('bc_site_global_settings', 'facebook_pixel',false, false);?>
<?php echo bc_get_theme_mod('bc_site_global_settings', 'linkedin_insight_tag',false, false);?>
</script>
<?php echo bc_get_theme_mod('bc_site_global_settings', 'google_analytics_ads',false, false);?>
<?php echo bc_get_theme_mod('bc_site_global_settings', 'call_tracking_code',false, false);?>
<?php echo bc_get_theme_mod('bc_site_global_settings', 'google_search_console',false, false);?>
<?php echo bc_get_theme_mod('bc_site_global_settings', 'additional_header_script',false, false);?>

<?php
}

add_action( 'wp_footer', 'global_settings_footer',999);
function global_settings_footer($wp_customize){
    // Chat section scripts
    echo bc_get_theme_mod('bc_site_chat_settings', 'chat_code',false, false);
    echo bc_get_theme_mod('bc_site_chat_settings', 'chat_completed',false, false);
    echo bc_get_theme_mod('bc_site_global_settings', 'additional_footer_script',false, false);
}
?>
<?php 

add_action( 'wp_head', 'tracking_per_page_header_script');
function tracking_per_page_header_script($wp_customize){
    $data = json_decode(bc_get_theme_mod('bc_site_perpage_scheme', 'per_page_code',false, false));
    global $post;
    if(isset($data) && !empty($data)){
        foreach ($data as $key => $value) {
            if($post->ID == $value->pageId){
                if($value->location == 'header'){?>
 
                    <?php echo $value->trackingCode;?>

                <?php
                }
            }
        }
    }
}

add_action( 'wp_footer', 'tracking_per_page_footer_script');
function tracking_per_page_footer_script($wp_customize){
    $data = json_decode(bc_get_theme_mod('bc_site_perpage_scheme', 'per_page_code',false, false));
    global $post;
    if(isset($data) && !empty($data)){
        foreach ($data as $key => $value) {
            if($post->ID == $value->pageId){
                 if($value->location == 'footer'){?>
                    <?php echo $value->trackingCode;?>
                <?php }
            }
        }
    }
}

