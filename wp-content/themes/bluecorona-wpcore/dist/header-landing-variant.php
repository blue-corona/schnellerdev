<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="icon" href="<?php echo bc_get_theme_mod('bc_theme_options', 'bc_favicon_upload',false, get_template_directory_uri().'/img/favicon.ico'); ?>">

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script data-search-pseudo-elements defer src="https://use.fontawesome.com/releases/latest/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
</head>
<body>
<!-- Show header accordingly fixed or default -->
<?php 
global $post;
if(bc_get_theme_mod('bc_theme_options', 'header', 'type', 'fixed') == 'fixed'){
    echo '<header class="bc_header sticky-top bc_color_secondary_bg">';
 }else{
    echo  '<header class="bc_header">';
 }?>
    <!-- announcement bar background color-->
    <?php if(get_post_meta( $post->ID, 'bc_announcement_setting_landing_page_'.$post->ID, true ) == 'Yes'){?>
    <div class="container-fluid bc_color_primary_bg bc_announcement_bar p-0">
        
        <!-- Hide this section if announcement bar is disabled-->
        <?php if(bc_get_theme_mod('bc_theme_options', 'header', 'announcement_bar', 'enabled') == 'enabled'){?>
        <div class="container">
            <div class="row text-center text-lg-left bc_announcement_bar_text">
                <!-- announcement bar content-->
                <?php echo bc_get_theme_mod('bc_theme_options', 'header','announcement_bar_content', '<div class="col-sm-12 col-lg-4 col-md-6 pt-2">
                    <h5 class="pl-lg-3">
                        <a class="bc_color_secondary font-weight-normal" href="#">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> Same Day Service
                        </a>
                    </h5>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-6 pt-2" style="color:#f9d71c;">
                    <h5 class="bc_color_warning">
                        <i aria-hidden="true" class="fa fa-star"></i>
                        <i aria-hidden="true" class="fa fa-star"></i>
                        <i aria-hidden="true" class="fa fa-star"></i>
                        <i aria-hidden="true" class="fa fa-star"></i>
                        <i aria-hidden="true" class="fa fa-star"></i>
                        <span>
                            <a class="bc_color_secondary no_hover_underline" href="#">
                                &nbsp; Read Our Reviews <i aria-hidden="true" class="fa fa-chevron-circle-right"></i>
                            </a>
                        </span>
                    </h5>
                </div>'); ?>
                <!-- announcement bar with search bar start -->
                <?php if( bc_get_theme_mod('bc_theme_options', 'header','search_bar', 'enabled') == 'enabled' && bc_get_theme_mod('bc_theme_options', 'bc_logo_location',false, 'left') == 'left' ){?>
                <?php get_template_part( 'page-templates/header/bc-announcement-bar-with-searchbar' ); ?>
                <?php }?>
                <!-- announcement bar with search bar end-->

                <!-- announcement bar with button start -->
                <?php if( bc_get_theme_mod('bc_theme_options', 'bc_logo_location',false, 'center') == 'center'){?>
                <?php get_template_part( 'page-templates/header/bc-announcement-bar-with-buttons' ); ?>
                <?php }?>
                <!-- announcement bar with button end-->
            </div>
        </div>
        <?php }?>
    </div>
    <?php }?>
    <?php 
        if(bc_get_theme_mod('bc_theme_options', 'bc_logo_location',false, 'left') == 'left'){
            // header with default start
            get_template_part( 'page-templates/header/bc-header-default' );
            // header with default end
        }else{
            // header with center logo start
            get_template_part( 'page-templates/header/bc-header-with-centerlogo'); 
            // header with center logo end
        }
    ?>
<?php 
if(get_post_meta( $post->ID, 'bc_navigation_setting_landing_page_'.$post->ID, true ) == 'On'){
    get_template_part( 'page-templates/common/bc-nav-menu' ); 
}
?>
</header>