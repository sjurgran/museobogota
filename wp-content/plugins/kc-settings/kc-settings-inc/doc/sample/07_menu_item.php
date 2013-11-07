<?php

/**
 * Sample menu item metadata options.
 *
 * @see 00_fields.php for complete field types.
 * @since 2.7.8
 */

add_filter( 'kc_menu_item_settings', 'kc_settings_sample_menu_item' );
function kc_settings_sample_menu_item( $groups ) {
	/**
	 * NOTE: Please copy/paste/edit the fields you need, then remove the require_once line.
	 * This is only for simplifying the development.
	 */
	require_once dirname(__FILE__) . '/00_fields.php';

	$my_group = array(
		array(
			'id'     => 'sample_section',
			'title'  => 'Section title',
			'desc'   => '<p>Some description about this options group</p>',
			'fields' => kc_settings_sample_fields() // NOTE: See 00_fields.php
		)
	);

	$groups[] = $my_group;
	return $groups;
}
