<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Includes Assets for Gutenberg Editor
 *
 * @return
 * @author Geoffrey Crofte
 * @since  1.1.0
 */
function juizl_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'juizl-gutenberg-buttons-scripts',
		JUIZL_PLUGIN_URL . 'assets/js/juizl-gutenberg-plugin.js',
		array( 'wp-editor', 'wp-i18n', 'wp-element', 'wp-compose', 'wp-components' ),
		JUIZL_VERSION,
		true
	);

	wp_enqueue_style(
		'juizl-gutenberg-buttons-styles',
		JUIZL_PLUGIN_URL . 'assets/css/juizl-editor-style.css',
		false,
		JUIZL_VERSION,
		'all'
	);
}
add_action( 'enqueue_block_editor_assets', 'juizl_enqueue_block_editor_assets', 9 );
