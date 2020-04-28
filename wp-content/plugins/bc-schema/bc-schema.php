<?php
/**
 * Plugin Name:       BC Schema
 * Plugin URI:        https://github.com/nikhil-twinspark/bc-schema
 * Description:       A simple plugin for creating custom post types for displaying schema.
 * Version:           1.0.0
 * Author:            Blue Corona
 * Author URI:        #
 * License:           AGPL-3.0
 * License URI:       https://www.gnu.org/licenses/agpl-3.0.txt
 * Text Domain:       bc-schema
 * Domain Path:       /languages
 */

 if ( ! defined( 'WPINC' ) ) {
     die;
 }

define( 'BC_SCHEMA_VERSION', '1.0.0' );
define( 'BCSCHEMADOMAIN', 'bc-schema' );
define( 'BCSCHEMAPATH', plugin_dir_path( __FILE__ ) );
define('BCPLUGINURL', plugins_url());

require_once( BCSCHEMAPATH . '/post-types/register.php' );
add_action( 'init', 'bc_schema_register_schema_type' );

require_once( BCSCHEMAPATH . '/custom-fields/register.php' );

function bc_schema_rewrite_flush() {
    bc_schema_register_schema_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'bc_schema_rewrite_flush' );

// plugin uninstallation
register_uninstall_hook( BCSCHEMAPATH, 'bc_schema_uninstall' );
function bc_schema_uninstall() {
    // Removes the directory not the data
}

