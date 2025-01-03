<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Enqueue styles and scripts files
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
function juizl_enqueues() {
	global $pagenow;

	wp_enqueue_style( 'juiz-lang-main', JUIZL_PLUGIN_URL . 'assets/css/admin.css', array(), JUIZL_VERSION, 'all' );
	wp_enqueue_script( 'juiz-lang-main', JUIZL_PLUGIN_URL . 'assets/js/admin.js', array( 'jquery' ), JUIZL_VERSION, array( 'in_footer' => true ) );

	$loc_datas = array(
		'add_other_item'  => esc_html__( 'Add another one', 'juiz-lang' ),
		'confirm_rm_item' => esc_html__( 'Are you sure you want to remove this hreflang?', 'juiz-lang' ),
	);
	wp_localize_script( 'juiz-lang-main', 'juizl', $loc_datas );
}
add_action( 'admin_enqueue_scripts', 'juizl_enqueues' );
