<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Add HREFLANG alternate link to concerned posts.
 *
 * @return (void)
 * @author Geoffrey Crofte
 */
function juiz_lang_wp_head() {
	global $post;

	if ( ! isset( $post->ID ) ) {
		return;
	}

	$juizl_meta = get_post_meta( $post->ID, '_juizl-hreflang', true );

	if ( ! $juizl_meta || ( is_array( $juizl_meta ) && isset( $juizl_meta['code'] ) && empty($juizl_meta['code'][0] ) ) ) {
		return;
	}
	
	/* if you ever wanna put you own link x-default */
	$links = "\r\n" . '<!-- Juiz Lang Attributes BEGINS -->' . "\r\n";
	$xDefault = '<link rel="alternate" hreflang="x-default" href="'. esc_url( get_permalink( $post->ID ) ) . '" />' . "\r\n";
	$links .= apply_filters( 'juiz_lang_x_default', $xDefault, $post );

	$i = 0;

	foreach ( $juizl_meta['href'] as $link ) {
		$links .= '<link rel="alternate" hreflang="' . ( isset( $juizl_meta['code'][$i] ) ? $juizl_meta['code'][$i] : '' ) . '" href="'. esc_url( $link ) . '" />' . "\r\n";
		$i++;
	}

	$links .= "\r\n" . '<!-- Juiz Lang Attributes ENDS -->' . "\r\n\r\n";

	echo apply_filters( 'juiz_lang_wp_head', $links, $juizl_meta );

}
add_action('wp_head', 'juiz_lang_wp_head');
