<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Array Map function on 2 dimensional array
 *
 * @param  (function) $func the function to execute
 * @param  (array)    $arr  the array to sanitize.
 * @return (array)          the sanitized array.
 */
if ( ! function_exists( 'array_map_r' ) ) {
	function array_map_r( $func, $arr ) {
		$newArr = array();

		foreach( $arr as $key => $value ) {
			$newArr[ $key ] = ( is_array( $value ) ? array_map_r( $func, $value ) : ( is_array($func) ? call_user_func_array($func, $value) : $func( $value ) ) );
		}

		return $newArr;
	}
}
