;( function( $, window, document, undefined ) {
	
	/**
	 * Accessibility Improvement.
	 */
	$( '[class^="juizl-"] .hide-if-no-js' ).attr( 'aria-hidden', 'false' );
	$( '[class^="juizl-"] .hide-if-js' ).attr( 'aria-hidden', 'true' );

	/**
	 * Add a new "Other" link.
	 */
	$( '#juizl-new-other-links' ).html( '<p class="juizl-increment"><button type="button" class="button juizl-button juizl-button-mini" id="juizl-add-item"><i class="dashicons dashicons-plus" aria-hidden="true"></i>&nbsp;' + juizl.add_other_item + '</button>' );

	var $place     = $( '.juizl-increment' ),
		$container = $( '.juizl-other-links' );

	$( '#juizl-add-item' ).on( 'click.juizl', function() {
		var $line   = $( '.juizl-to-duplicate' ),
			id      = $line.find( 'label' ).attr( 'for' ),
			$clone  = $line.clone(),
			cname   = 'juizl-hreflang-code-',
			cname2  = 'juizl-hreflang-href-',
			$delbtn = $( '#juizl-del-btn' ).html(),
			nbitems = $container.find( '.juizl-mb-line' ).length;

		$line.removeClass( 'juizl-to-duplicate' );

		id = parseInt( id.split( cname )[1] );

		$clone.find( 'label[for=' + ( cname + id ) + ']' ).attr( 'for', cname + ( id + 1 ) );
		$clone.find( 'input[id=' + ( cname + id ) + ']' ).attr( 'id', cname + ( id + 1 ) );
		$clone.find( 'label[for=' + ( cname2 + id ) + ']' ).attr( 'for', cname2 + ( id + 1 ) );
		$clone.find( 'input[id=' + ( cname2 + id ) + ']' ).attr( 'id', cname2 + ( id + 1 ) );
		$clone.find( 'input' ).val('');
		
		$line.after( $clone );

		// If we just added a second line, adding del btn too
		if ( nbitems === 1 ) {
			$container.find( '.juizl-mb-line' ).each( function(){
				$(this).find( '.juizl-remove-link' ).html( $delbtn );
			} );
		}

		return false;
	} );

	/**
	 * Remove a metabox Other Link line
	 */
	$container.on( 'click.juizl', '.juizl-remove-link-btn', function() {
		var $_this  = $(this),
			$parent = $_this.closest( '.juizl-mb-line' ),
			hint    = $parent.find('input').eq(0).val() ? "\n\n" + $parent.find('input').eq(0).val() + ' - ' + $parent.find('input').eq(1).val() + "\n\n" : '';

		if ( confirm( juizl.confirm_rm_item + hint ) ) {
			var nbitems = $container.find( '.juizl-mb-line' ).length;

			$parent.addClass( 'to-remove' );
			setTimeout(function(){
				$parent.remove();

				// If we remove the model to duplicate, attribute another model.
				if ( $parent.hasClass( 'juizl-to-duplicate' ) ) {
					$container.find( '.juizl-mb-line:last' ).addClass( 'juizl-to-duplicate' );
				}
				// If we remove the before-the-last item, remove the del button.
				if ( nbitems === 2 ) {
					$container.find( '.juizl-mb-line:first' ).find( '.juizl-remove-link-btn' ).remove();
				}
			}, 400 );
		}

		return false;
	} );

} )( jQuery, window, document );
