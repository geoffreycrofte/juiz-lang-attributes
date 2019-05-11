<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Register custom meta boxes to Posts and Pages
 *
 * @param  (object) $post The current editing Post object.
 * @return void
 * 
 * @since  1.0
 * @author Geoffre Crofte
 */
function juizl_custom_meta_boxes( $post ) {

	add_meta_box(
		'juizl-hreflang',
		__( 'Custom HREFLANG', 'juiz-lang' ),
		'juizl_hreflang_mb',
		null,
		'normal',
		'high',
		null // callback_args (array)
	);
}
add_action( 'add_meta_boxes', 'juizl_custom_meta_boxes' );

/**
 * Add custom Content Type meta boxes.
 *
 * @param  (object) $post The current editing Post object.
 * @return void
 * 
 * @since  1.0
 * @author Geoffrey Crofte
 */
function juizl_hreflang_mb( $post ) {

	$juizl_hreflangs = get_post_meta( $post->ID, '_juizl-hreflang', true );

	$output  = '<p class="juizl-mb-description">' . sprintf( __( 'You can provide alternate URL to Google if your content is translated somewhere in the Web. Fill code with 2-letters (%s for English) code or 4-letters (%s for English in United State) code if you specify the region.', 'juiz-lang' ), '<code>en</code>', '<code>en-US</code>' ) . '</p>';

	$output .= '<div class="juizl-mb-block">';
	$output .= '<div class="juizl-other-links" id="juizl-other-links" role="region" aria-live="polite" aria-relevant="additions removals">';

	$delbtn = '<button type="button" class="juizl-remove-link-btn juizl-button juizl-button-mini" aria-controls="juizl-other-links"><span class="screen-reader-text">' . __( 'Remove this link', 'juiz-lang' ) . '</span><i class="dashicons dashicons-no-alt" aria-hidden="true"></i></button>';

	$output .= '<script id="juizl-del-btn" type="text/template">' . $delbtn . '</script>';

	$doclink = ' (<a href="https://omegat.sourceforge.io/manual-standard/en/appendix.languages.html" target="_blank">ISO 639-1</a>)';

	$c = isset( $juizl_hreflangs['code'] ) ? count( $juizl_hreflangs['code'] ) : 0;
	$i = 1;

	$output .= '<p class="juizl-mb-line juizl-inlined-inputs' . ( $c === $i || $c === 0 ? ' juizl-to-duplicate' : '' ) . '">
			<span class="juizl-small-col">
				<label for="juizl-hreflang-code-' . $i . '">' . __( 'Language Code', 'juiz-lang' ) . $doclink . '</label><br>
				<input type="text" name="juizl-hreflang[code][]" id="juizl-hreflang-code-' . $i . '" value="' . ( $c > 0 && isset( $juizl_hreflangs['code'][0] ) ? esc_attr( $juizl_hreflangs['code'][0] ) : '' ) . '" />
			</span>
			<span class="juizl-big-col">
				<label for="juizl-hreflang-href-' . $i . '">' . __( 'URL', 'juiz-lang' ) . '</label><br>
				<input type="url" name="juizl-hreflang[href][]" id="juizl-hreflang-href-' . $i . '" value="' . ( $c > 0 && isset( $juizl_hreflangs['href'][0] ) ? esc_attr( $juizl_hreflangs['href'][0] ) : '' ) . '" />
			</span>
			<span class="juizl-remove-link">' . ( $c > 1 ? $delbtn : '' ) . '</span>
	</p>';

	if ( ! empty( $juizl_hreflangs ) && is_array( $juizl_hreflangs ) && isset( $juizl_hreflangs['code'] ) && $c > 1 ) {
		// Remove the first entry.
		unset( $juizl_hreflangs['code'][0] );
		unset( $juizl_hreflangs['href'][0] );
		unset( $juizl_hreflangs['canon'][0] );

		// Pass through the others.
		foreach ( $juizl_hreflangs['code'] as $lang ) {
			$i++;
			$output .= '<p class="juizl-mb-line juizl-inlined-inputs' . ( $c === $i ? ' juizl-to-duplicate' : '' ) . '">
					<span class="juizl-small-col">
						<label for="juizl-hreflang-code-' . $i . '">' . __( 'Language Code', 'juiz-lang' ) . $doclink . '</label><br>
						<input type="text" name="juizl-hreflang[code][]" id="juizl-hreflang-code-' . $i . '" value="' . esc_attr( $lang ) . '" />
					</span>
					<span class="juizl-big-col">
						<label for="juizl-hreflang-href-' . $i . '">' . __( 'URL', 'juiz-lang' ) . '</label><br>
						<input type="url" name="juizl-hreflang[href][]" id="juizl-hreflang-href-' . $i . '" value="' . esc_url( $juizl_hreflangs['href'][$i-1] ) . '" />
					</span>
					<span class="juizl-remove-link">' . $delbtn . '</span>
			</p>';
		}

	}

	// Prepare JS scripting.
	$output .= '<div id="juizl-new-other-links"></div></div><!-- .other-links -->';
	$output .= '</div><!-- .juizl-mb-block -->';
	$output .= '<p>' . sprintf( __( 'Keep in mind that if you use a plugin to translate your content, the %1$s attributes may already exist (automatically generated between you own contents). If you need to link to an external website, make sure this website also filled the right %1$s to your website. For more information: %2$sGoogle about localized pages%3$s', 'juiz-lang' ), '<code>hreflang</code>', '<a href="https://support.google.com/webmasters/answer/189077?hl=en">', '</a>' ) . '</p>';

	echo apply_filters( 'juizl_hreflang_mb', $output, $post );

}

/**
 * Save all the datas about Juiz Lang Metaboxes.
 *
 * @param  (int) $post_id The current post ID.
 * @return void
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
function juizl_save_mb( $post_id ) {

	if ( ! isset( $_POST['_wpnonce'] ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['juizl-hreflang'] ) && is_array( $_POST['juizl-hreflang'] ) ) {
		
		$newarr = array_map_r( 'strip_tags', $_POST['juizl-hreflang'] );

		update_post_meta( $post_id, '_juizl-hreflang', $newarr );
	}
}
add_action( 'save_post', 'juizl_save_mb' );
