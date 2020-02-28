<?php

/**
 *  Plugin name:    CFT-export
 *  Description:    Export of Custom Field Type
 *  Author:         Ella Schwarz
 *  Version:        1.0
 *  Text Domain:    cft-export
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e551ebed7d34',
	'title' => 'objectinfo',
	'fields' => array(
		array(
			'key' => 'field_5e551ed236ed8',
			'label' => 'Address',
			'name' => 'address',
			'type' => 'text',
			'instructions' => 'Enter the address',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e5904a9fcb6c',
			'label' => 'Area',
			'name' => 'area',
			'type' => 'text',
			'instructions' => 'Type the area in which the object is located',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e5903b1b3ae7',
			'label' => 'City',
			'name' => 'city',
			'type' => 'text',
			'instructions' => 'Type the city in which the object is located',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e5520860b34d',
			'label' => 'Price',
			'name' => 'price',
			'type' => 'number',
			'instructions' => 'Enter the starting price',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => 'kr',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5e5520bf3e334',
			'label' => 'm²',
			'name' => 'm²',
			'type' => 'number',
			'instructions' => 'Enter the m² size of the object',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5e55210cf4449',
			'label' => 'Rooms',
			'name' => 'rooms',
			'type' => 'number',
			'instructions' => 'Enter the number of rooms, e.g. bedrooms + living rooms.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5e552148a4894',
			'label' => 'Inspection times',
			'name' => 'inspection_times',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'F j, Y g:i a',
			'return_format' => 'F j, Y g:i a',
			'first_day' => 1,
		),
		array(
			'key' => 'field_5e552535b28e5',
			'label' => 'Selected',
			'name' => 'selected',
			'type' => 'button_group',
			'instructions' => 'Is this object selected to be shown at the top of the page?',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Yes' => 'Yes',
				'No' => 'No',
			),
			'allow_null' => 1,
			'default_value' => 'No',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'objects',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

add_action( 'init', 'acf_add_local_field_group' );