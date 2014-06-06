<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   wp_mwembed
 * @author    Alexandre Girard <hi@alexgirard.com>
 * @license   GPL-2.0+
 * @link      http://alexgirard.com
 * @copyright 2014 Alexandre Girard
 *
 * @wordpress-plugin
 * Plugin Name:       wp_mwembed
 * Plugin URI:        http://github.com/alx/wp_mwembed
 * Description:       Insert mwembed video player from Kaltura CE setup
 * Version:           0.1.0
 * Author:            Alexandre Girard
 * Author URI:        http://alexgirard.com
 * Text Domain:       wp_embed
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/alx/wp_mwembed
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-mwembed.php' );

register_activation_hook( __FILE__, array( 'wp_mwembed', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'wp_mwembed', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'wp_mwembed', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-mwembed-admin.php' );
	add_action( 'plugins_loaded', array( 'wp_mwembed_admin', 'get_instance' ) );

}
