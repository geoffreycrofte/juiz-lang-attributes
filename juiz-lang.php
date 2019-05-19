<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Plugin Name: Juiz Lang Attributes
 * Plugin URI: http://wordpress.org/extend/plugins/juiz-lang
 * Description: Add a custom HREFLANG meta box and 2 buttons on your editor to add <code>lang</code> and <code>hreflang</code> attributes on your post to manually edit the link between your post and a translation (which could be outside your domain).
 * Author: <a href="https://geoffrey.crofte.fr">Geoffrey Crofte</a>
 * Version: 1.1.2
 * Author URI: https://geoffrey.crofte.fr
 * License: GPLv2 or later
 * Text Domain: juiz-lang
 */

define( 'JUIZL_PLUGIN_NAME',   'Juiz Lang Attributes' );
define( 'JUIZL_VERSION',       '1.1.2' );
define( 'JUIZL_FILE',          __FILE__ );
define( 'JUIZL_DIRNAME',       dirname( JUIZL_FILE ) );
define( 'JUIZL_CLASSES_DIR',   JUIZL_DIRNAME . '/inc/classes/' );
define( 'JUIZL_DIRBASENAME',   basename( dirname( JUIZL_FILE ) ) );
define( 'JUIZL_PLUGIN_URL',    plugin_dir_url( JUIZL_FILE ));
define( 'JUIZL_SLUG',          'juizl' );
define( 'JUIZL_SETTING_SLUG', 'juizl_settings' );

require_once( JUIZL_CLASSES_DIR . 'Juiz-Lang.php' );

$juizl = new Juiz_Lang();
