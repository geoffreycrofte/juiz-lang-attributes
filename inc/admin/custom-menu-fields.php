<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/**
 * Add custom fields to $item nav object
 * in order to be used in custom Walker
 *
 * @param  (object) $menu_item The current menu item
 * @return void
 * 
 * @since  1.2.0
 * @author Geoffrey Crofte
 */
function juizl_add_custom_menu_fields( $menu_item ) {

	$menu_item -> langattr = get_post_meta( $menu_item -> ID, '_menu_item_langattr', true );
	$menu_item -> hreflang = get_post_meta( $menu_item -> ID, '_menu_item_hreflang', true );

	return $menu_item;
	
}
add_action( 'wp_setup_nav_menu_item', 'juizl_add_custom_menu_fields' );


/**
 * Save menu custom fields
 *
 * @param  (int)    $menu_id         The ID of the updated menu
 * @param  (int)    $menu_item_db_id The ID of the updated menu item
 * @param  (array)  $args            An array of arguments used to update a menu item.
 * @return void
 * 
 * @since  1.2.0
 * @author Geoffrey Crofte
 */
function juizl_update_custom_menu_fields( $menu_id, $menu_item_db_id, $args ) {
	// Check if element is properly sent
	if ( is_array( $_REQUEST['menu-item-langattr']) ) {
		$lang_value = $_REQUEST['menu-item-langattr'][$menu_item_db_id];
		$saved = update_post_meta( $menu_item_db_id, '_menu_item_langattr', $lang_value );
	}

	if ( is_array( $_REQUEST['menu-item-hreflang']) ) {
		$hreflang_value = $_REQUEST['menu-item-hreflang'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_hreflang', $hreflang_value );
	}
}
add_action( 'wp_update_nav_menu_item', 'juizl_update_custom_menu_fields', 10, 3 );


/**
 * Define new Walker edit
 * 
 * @param int      $item_id Menu item ID.
 * @param WP_Post  $item    Menu item data object.
 * @param int      $depth   Depth of menu item. Used for padding.
 * @param stdClass $args    An object of menu item arguments.
 * @param int      $id      Nav menu ID.
 * @return void
 * 
 * @since  1.2.0
 * @author Geoffrey Crofte
*/
function juizl_edit_walker($item_id, $item, $depth, $arg, $id) {
	$hreflangattr = isset( $item->hreflang ) ? $item->hreflang : '';
	$langattr     = isset( $item->langattr ) ? $item->langattr : '';
?>
	<p class="field-hreflang field-langs description description-thin" style="margin-top:24px;margin-bottom: 24px;">
		<label for="edit-menu-item-hreflang-<?php echo $item_id; ?>">
			<span class="edit-menu-label"><?php esc_html_e('Destination language', 'juizl-lang') ?></span><br />
			<input type="text" id="edit-menu-item-hreflang-<?php echo $item_id; ?>" class="widefat code edit-menu-item-hreflang" name="menu-item-hreflang[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $hreflangattr ); ?>" />
			<span class="description"><?php esc_html_e( 'If the link leads to a page in a different language thant the current page’s one.', 'juiz-lang' ); ?> <a href="<?php esc_html_e('https://en.wikipedia.org/wiki/Hreflang#Language_and_Country_Codes', 'juizl-lang'); ?>" target="_blank"><?php esc_html_e('Documentation'); ?></a></span>
		</label>
	</p>

	<p class="field-langattr field-langs description description-thin" style="margin-top:24px;margin-bottom: 24px;">
		<label for="edit-menu-item-lang-<?php echo $item_id; ?>">
			<span class="edit-menu-label"><?php esc_html_e('Text language', 'juizl-lang') ?></span><br />
			<input type="text" id="edit-menu-item-lang-<?php echo $item_id; ?>" class="widefat code edit-menu-item-langattr" name="menu-item-langattr[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $langattr ); ?>" />
			<span class="description"><?php esc_html_e( 'If the text on the link is in a different language than the current page’s one.', 'juiz-lang' ); ?>  <a href="<?php esc_html_e('https://en.wikipedia.org/wiki/Hreflang#Language_and_Country_Codes', 'juizl-lang'); ?>" target="_blank"><?php esc_html_e('Documentation'); ?></a></span>
		</label>
	</p>

<?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'juizl_edit_walker', 9, 5 );
