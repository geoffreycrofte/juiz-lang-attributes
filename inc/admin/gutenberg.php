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

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	// Enqueue editor styles.
	add_editor_style( JUIZL_PLUGIN_URL . 'assets/css/juiz-lang-gutenberg.css' );

	wp_enqueue_script(
		'juiz-lang-gutenberg-buttons-scripts',
		JUIZL_PLUGIN_URL . 'assets/js/juiz-lang-gutenberg-plugin.js',
		array( 'wp-editor', 'wp-i18n', 'wp-element', 'wp-compose', 'wp-components' ),
		JUIZL_VERSION,
		array(
			'in_footer' => true
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'juizl_enqueue_block_editor_assets', 9 );
