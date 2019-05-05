<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Add an options page in the Settings menu.
 * 
 * @return void
 *
 * @author Geoffrey Crofte
 * @since 1.0
 */
/*function speekr_add_settings_menu(){
	add_submenu_page(
		'edit.php?post_type=talks',
		__( 'Speekr Options', 'speekr'),
		__( 'Options', 'speekr'),
		apply_filters( 'speekr_settings_page_capabilities', 'manage_options' ),
		SPEEKR_SLUG,
		'speekr_settings_page'
	);

	add_submenu_page(
		'edit.php?post_type=talks',
		__( 'Speekr Importer', 'speekr'),
		__( 'Import', 'speekr'),
		apply_filters( 'speekr_importer_page_capabilities', 'publish_posts' ),
		'speekr-importer',
		'speekr_importer_page'
	);
}
add_action( 'admin_menu', 'speekr_add_settings_menu' );*/

/**
 * Add a link to the plugin description in the plugin list.
 *
 * @return void
 *
 * @author Geoffrey Crofte
 * @since 1.0
 */
/*function speekr_plugin_action_links( $links, $file ) {
	$links[] = '<a href="' . speekr_get_option_page_url() . '">' . __( 'Settings' ) . '</a>';
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( SPEEKR_FILE ), 'speekr_plugin_action_links',  10, 2 );
*/