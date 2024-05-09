<?php
/**
 * Plugin Name: WP Challenge #2 - Medior: Contact form - Shortcode
 * Author:      Jorge Fosela
 * Author URI:  https://jorgefosela.dev
 * Description: A simple shortcode to display a contact form. Also contains a filter for extending the plugin.
 * Version:     2.0
 *
 * @package     wp-challenge-2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once plugin_dir_path( __FILE__ ) . '/hooks/filters/form-fields.php';
require_once plugin_dir_path( __FILE__ ) . '/helpers/render-form-fields.php';
require_once plugin_dir_path( __FILE__ ) . '/shortcode.php';
