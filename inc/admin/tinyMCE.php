<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Push new buttons to the editor.
 * @param  (array) $buttons The array of existing buttons.
 * @return (array)          The updated list of buttons call with the JS file.
 * @see /assets/js/juizl-plugin.js
 */
function juizl_register_buttons( $buttons ) {
    array_push( $buttons, 'juizlangattr', 'juizhreflangattr' );
    return $buttons;
}
add_filter( 'mce_buttons', 'juizl_register_buttons' );

/**
 * Load the Tiny MCE new plugin.
 *
 * @param  (array) $plugin_array The existing array of plugins.
 * @return (array)               The array with the new plugin.
 */
function juizl_register_tinymce_javascript( $plugin_array ) {
    $plugin_array['juizl'] = JUIZL_PLUGIN_URL . '/assets/js/juiz-lang-tinymce-plugin.js';
    return $plugin_array;
}
add_filter( 'mce_external_plugins', 'juizl_register_tinymce_javascript' );

/**
 * Add Editor Styles to distinguish elements with those 2 attributes.
 *
 * @param  (string) $mce_css The existing styles.
 * @return (string)          The new styles added.
 */
function juizl_add_editor_styles( $mce_css ) {
	$mce_css .= ', ' . JUIZL_PLUGIN_URL . 'assets/css/juiz-lang-classic-editor.css';
    return $mce_css;
}
add_action( 'mce_css', 'juizl_add_editor_styles' );

/**
 * Authorize all lang attributes on link to avoid WP removing those.
 *
 * @param  (array) $allowed_html TinyMCE options.
 * @param  (string) $context     The context of the check.
 * @return (array)               Extended valid elements added to the array.
 */
function juizl_allowed_lang_attributes( $allowed_html, $context ) {
	$allowed_html['a']['lang'] = true;
	$allowed_html['a']['hreflang'] = true;
    return $allowed_html;
}
add_filter('wp_kses_allowed_html', 'juizl_allowed_lang_attributes', 10, 2);
