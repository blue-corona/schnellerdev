<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.

	'/widgets/bc-services-widget.php',            // BC Service widget area.
	'/widgets/bc-testimonials-widget.php',        // BC Testimonial widget area.
	'/widgets/bc-gravity-form-widget.php',        // BC Gravity widget area.
	'/widgets/bc-promotions-widget.php',          // BC Promotions widget area.
	'/widgets/bc-footer-address-widget.php',      // BC Footer Address widget area.
	'/widgets/bc-footer-menuone-widget.php',      // BC Footer Menu One widget area.

	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/class-wp-bc-navwalker.php', 			// Load BC custom Wordpress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/custom-functions.php',                // Load custom functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

/*
* Enqueue theme customizer files 
* path : inc/theme-customizer
*/
$theme_customizer_includes = array(
	'bc-site-identity.php',                // Load site identity
	'bc-navigation.php',                   // Load site navigation property
	'bc-header.php',                       // Load site header property
	'bc-fonts.php',                        // Load site fonts property
	'bc-home.php',                         // Load site home property
	'bc-social-media.php',                 // Load site social media property
	'bc-footer.php',                       // Load site footer property
	'bc-tracking.php',                     // Load tracking setup property
);

foreach ( $theme_customizer_includes as $file ) {
	$filepath = locate_template( 'inc/theme-customizer/' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

/*
 * Enqueue required javascript & CSS libraries required for the theme
 */
add_action('wp_enqueue_scripts', 'bc_theme_include_css_js');
function bc_theme_include_css_js(){
	wp_enqueue_style('bc-animate-css','https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css',true);
	wp_enqueue_script('bc-font-awesome-pro', 'https://kit.fontawesome.com/f6a235ce10.js');
}

/*Theme Customization Includes Starts*/
/* Enqueue required javascript & CSS libraries required in theme customizer & website */
add_action('admin_enqueue_scripts', 'bc_include_admin_css_js');
function bc_include_admin_css_js($hook){
	wp_enqueue_style('bc-admin-css', get_template_directory_uri().'/css/blue-corona-custom-style.css',true);
	wp_enqueue_script( 'bc-admin-js-theme-customizer',  get_template_directory_uri().'/js/bc-slider-customizer-preview.js',true );
}
/* For mulitple checkbox selection
Refrence : http://justintadlock.com/archives/2015/05/26/multiple-checkbox-customizer-control*/
add_action( 'customize_register', 'bc_load_customize_controls', 0 );
function bc_load_customize_controls() {
	require_once( trailingslashit( get_template_directory() ) . 'inc/theme-customizer/control-checkbox-multiple.php' );
}
/*Include custom classes for tracking & social media*/
require_once trailingslashit(get_template_directory())."custom/inc/custom-social-controls.php";
require_once trailingslashit(get_template_directory())."custom/inc/custom-tracking-controls.php";

/*Theme Customization Includes Ends*/


add_action( 'admin_enqueue_scripts', 'bc_wordpress_default_colorpicker');
if ( ! function_exists( 'bc_wordpress_default_colorpicker' ) ){
    function bc_wordpress_default_colorpicker( $hook ) {
        wp_enqueue_style( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker');
    }
}


add_filter( 'gform_submit_button', 'add_custom_css_class1', 10, 2 );
function add_custom_css_class1( $button, $form ) {
    if ($form['id'] != 3) return $button;
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $classes = $input->getAttribute( 'class' );
    $classes .= " mt-3";
    $input->setAttribute( 'class', $classes );
    
    return $dom->saveHtml( $input );
}

/*Remove RSS*/
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
