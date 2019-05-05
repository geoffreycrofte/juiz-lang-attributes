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

	if ( ! $juizl_meta ) {
		return;
	}
	
	$links = apply_filters( 'juiz_lang_x_default', '<link rel="alternate" hreflang="x-default" href="'. get_the_permalink( $post->ID ) . '" />', $post );

	$i = 0;

	foreach ( $juizl_meta['href'] as $link ) {
		$links .= '<link rel="alternate" hreflang="' . ( isset( $juizl_meta['code'][$i] ) ? $juizl_meta['code'][$i] : '' ) . '" href="'. esc_url( $link ) . '" />';
		$i++;
	}

	echo apply_filters( 'juiz_lang_wp_head', $links, $juizl_meta );

}
add_action('wp_head', 'juiz_lang_wp_head');
