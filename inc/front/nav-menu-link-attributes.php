<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Filters the HTML attributes applied to a menu item's anchor element.
 *
 * @access public
 * @since  1.2.0
 * @return void
*/
function juizl_custom_link_attrs( $atts, $item, $args, $depth ) {

	$hreflang = get_post_meta( $item -> db_id, '_menu_item_hreflang', true );
	
	if ( ! empty( $hreflang ) ) {
		$atts['hreflang'] = esc_attr( $hreflang );
	}

	$langattr = get_post_meta( $item -> db_id, '_menu_item_langattr', true );

	if ( ! empty( $langattr ) ) {
		$atts['lang'] = esc_attr( $langattr );
	}

	return apply_filters( 'juizl_custom_link_attrs', $atts, $item, $args, $depth );
}

add_filter( 'nav_menu_link_attributes', 'juizl_custom_link_attrs', 10, 4 );
