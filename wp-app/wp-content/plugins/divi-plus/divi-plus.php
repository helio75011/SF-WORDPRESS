<?php
 /*
Plugin Name: Divi Plus
Plugin URI:  https://diviextended.com/product/divi-plus/
Description: Divi Plus is a premium multipurpose plugin that comes with multiple exceptional modules. Using these unique and powerful modules, you'll be able to create different web page elements that would increase your site's functionality as well as appearance.
Version:     1.9.5
Author:      Elicus
Author URI:  https://elicus.com/
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: divi-plus
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'ELICUS_DIVI_PLUS_VERSION', '1.9.5' );
define( 'ELICUS_DIVI_PLUS_OPTION', 'el-divi-plus-option' );
define( 'PLUGIN_PATH', plugin_dir_url( __FILE__ ) );
define( 'ELICUS_DIVI_PLUS_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'ELICUS_DIVI_PLUS_BASENAME', plugin_basename( __FILE__ ) );

require_once plugin_dir_path( __FILE__ ) . 'includes/src/class-installation.php';
register_activation_hook( __FILE__, array( 'El_Divi_Plus_Installation', 'el_plugin_add_installs' ) );
register_deactivation_hook( __FILE__, array( 'El_Divi_Plus_Installation', 'el_plugin_remove_installs' ) );

if ( ! function_exists( 'dipl_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function dipl_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviPlus.php';
}
add_action( 'divi_extensions_init', 'dipl_initialize_extension' );
endif;