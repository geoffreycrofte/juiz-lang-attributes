<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

class Juiz_Lang {

	public function __construct() {
		add_action( 'init', array( $this, 'load_textdomain' ) );
		
		$this->is_network();
		$this->includes();

		if ( is_admin() ) {
			$this->includes_admin();
		} else {
			$this->includes_front();
		}

		register_activation_hook( JUIZL_FILE, array( $this, 'install' ) );
	}


	/**
	 * Set a define for network activation.
	 *
	 * @return void
	 * @since  1.0
	 * @author Geoffrey Crofte
	 */
	public function is_network() {
		$is_nw_activated = function_exists( 'is_plugin_active_for_network' ) && is_plugin_active_for_network( JUIZL_SLUG . '/' . JUIZL_SLUG . '.php' ) ? true : false;

		define( 'JUIZL_NETWORK_ACTIVATED', $is_nw_activated );
	}

	/**
	 * Make plugin translatable
	 *
	 * @return void
	 * @since  1.0
	 * @author Geoffrey Crofte
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'juiz-lang', false, JUIZL_DIRBASENAME . '/languages' );
	}

	/**
	 * Generate needed datas.
	 *
	 * @return void
	 * @since  1.0
	 * @author Geoffrey Crofte
	 */
	public function install() {
		$juizl_options = juizl_get_options();
	}

	/**
	 * Includes front and admin components.
	 *
	 * @return void
	 * @since  1.0
	 * @author Geoffrey Crofte
	 */
	public function includes() {
		do_action( 'juizl_before_includes' );

		require_once( JUIZL_DIRNAME . '/inc/functions/sanitize.php' );

		do_action( 'juizl_after_includes' );
	}

	/**
	 * Includes admin components.
	 *
	 * @return void
	 * @since  1.0
	 * @author Geoffrey Crofte
	 */
	public function includes_admin() {
		do_action( 'juizl_before_includes_admin' );

		require_once( JUIZL_DIRNAME . '/inc/admin/custom-meta-boxes.php' );
		require_once( JUIZL_DIRNAME . '/inc/admin/enqueues.php' );
		require_once( JUIZL_DIRNAME . '/inc/admin/tinyMCE.php' );

		do_action( 'juizl_after_includes_admin' );
	}

	/**
	 * Includes front components.
	 *
	 * @return void
	 * @since  1.0
	 * @author Geoffrey Crofte
	 */
	public function includes_front() {
		do_action( 'juizl_before_includes_front' );

		require_once( JUIZL_DIRNAME . '/inc/front/wp-head.php' );

		do_action( 'juizl_after_includes_front' );
	}

}