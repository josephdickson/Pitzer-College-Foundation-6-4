<?php // Requires Advanced Custom Fields - social icons built into theme

/**
 * Register style for social networking icons.
 */
function register_plugin_pz_social_networks() {
	wp_enqueue_style( 'pz_social_networks', get_template_directory_uri() . '/css/social_network_styles.css' , '' ,'' , 'all' );
	wp_enqueue_style( 'pz_social_networks' );
}

add_action( 'wp_enqueue_scripts', 'register_plugin_pz_social_networks' );

if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Social Networks',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}

else {

	// do nothing

}

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_542986452cf69',
	'title' => 'Social Networks',
	'fields' => array (
		array (
			'key' => 'field_54ee149552273',
			'label' => 'Icon Size',
			'name' => 'icon_size',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => 'Choose the icon size "in pixels"',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'fifty' => 'fifty',
				'fourty' => 'fourty',
				'thirty' => 'thirty',
				'twenty-five' => 'twenty-five',
				'twenty' => 'twenty',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_54ee142352272',
			'label' => 'Icon Appearance',
			'name' => 'icon_appearance',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'circle' => 'circle',
				'rounded' => 'rounded',
				'square' => 'square',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_542989555d625',
			'label' => 'Social Networks',
			'name' => 'social_networks',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_542989745d626',
					'label' => 'Social Network URL',
					'name' => 'social_network_url',
					'prefix' => '',
					'type' => 'text',
					'instructions' => 'Url of social network page.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_542987745d623',
					'label' => 'Social Icon',
					'name' => 'social_icon',
					'prefix' => '',
					'type' => 'radio',
					'instructions' => 'Choose social network to display on this site.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'Facebook' => 'Facebook',
						'Flickr' => 'Flickr',
						'Instagram' => 'Instagram',
						'Linkedin' => 'Linkedin',
						'Pinterest' => 'Pinterest',
						'Twitter' => 'Twitter',
						'Vimeo' => 'Vimeo',
						'YouTube' => 'YouTube',
						'webinar' => 'Webinar'
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'vertical',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-social-networks',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;
