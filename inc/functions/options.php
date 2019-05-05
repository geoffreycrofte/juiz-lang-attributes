<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Get a precise option from Juiz Lang plugin options.
 *
 * @param  string  $option  The option name
 * @param  string  $default The fallback value if option doesn't exist
 * @return string           The option value
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
function juizl_get_option( $option, $default = false) {
	/**
	 * Pre-filter any Juiz Lang option before read
	 *
	 * @since 1.0
	 * @param variant $default The default value
	*/
	$value = apply_filters( 'juizl_pre_get_option_' . $option, NULL, $default );

	if ( NULL !== $value ) {
		return $value;
	}

	$plugins = get_site_option( 'active_sitewide_plugins');
	$options = isset( $plugins[ JUIZL_SLUG . '/' . JUIZL_SLUG . '.php' ] ) ? get_site_option( JUIZL_SETTING_SLUG ) : get_option( JUIZL_SETTING_SLUG );
	$value 	 = isset( $options[ $option ] ) && $options[ $option ] !== '' ? $options[ $option ] : $default;
	
	/**
	 * Filter any Juiz Lang option after read.
	 *
	 * @since 1.0
	 * @param variant $default The default value
	*/
	return apply_filters( 'juizl_get_option_' . $option, $value, $default );
}

/**
 * Get all the Juiz Lang plugin options.
 *
 * @return array
 * 
 * @since  1.0
 * @author Geoffrey Crofte
 */
function juizl_get_options() {
	/**
	 * Pre-filter any Juiz Lang option before read.
	 *
	 * @since 1.0
	 * @param variant $default The default value
	*/
	$value = apply_filters( 'juizl_pre_get_options', NULL );

	if ( NULL !== $value ) {
		return $value;
	}

	$plugins = get_site_option( 'active_sitewide_plugins' );
	$options = isset( $plugins[ JUIZL_SLUG . '/' . JUIZL_SLUG . '.php' ] ) ? get_site_option( JUIZL_SETTING_SLUG ) : get_option( JUIZL_SETTING_SLUG );

	/**
	 * Filter any Juiz Lang option after read.
	 *
	 * @since 1.0
	 * @param variant $default The default value
	*/
	return apply_filters( 'juizl_get_options', $options );
}

/**
 * Updating options to the right place.
 * Multisite compatibility.
 *
 * @param (array) $options The array of option for Juiz Lang
 * @return (string) update_option() function return.
 *
 * @author Geoffrey Crofte
 * @since 1.0
 */
function juizl_update_options( $options ) {

	if ( ! is_array( $options ) ) {
		die( '$options has to be an array' );
	}

	// When we want to update options in a network activated website.
	if ( true === JUIZL_NETWORK_ACTIVATED ) {
		$options = update_blog_option( get_current_blog_id(), JUIZL_SETTING_SLUG, $options );
	}

	// When we want to update options in a simple website.
	else {
		$options = update_option( JUIZL_SETTING_SLUG, $options );
	}

	return $options;
}

/**
 * Updating a specific option.
 * Multisite compatibility.
 *
 * @param (string) $the_option The option to update.
 * @param (string) $the_value  The value of the option.
 * @return (string) update_option() function return.
 *
 * @author Geoffrey Crofte
 * @since 1.0
 */
function juizl_update_option( $the_option, $the_value ) {

	$options = juizl_get_options();

	$options[ $the_option ] = $the_value;

	return juizl_update_options( $options );

}
