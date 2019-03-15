<?php
/**
 * DevriX Starter Theme Customizer.
 *
 * @package Aniki
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aniki_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_control('header_image');

	//welcome message - section
	$wp_customize->add_section (
		'aniki_welcome_message_section',
		array(
			'title' => esc_attr('Welcome message', 'aniki'),
			'priority' => 21,
		)
	);

	//welcome message - setting
	$wp_customize->add_setting (
		'aniki_welcome_message_setting',
		array(
			'default' => esc_attr('Hey there, nice to meet you! Thanks for coming by to my awesome blog site. I hope you enjoy your stay here and give me some feedback on the content I provided.', 'aniki'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control (
	'aniki_welcome_message_setting',
		array(
			'type' => 'textarea',
			'label' => esc_attr('Welcome message text', 'aniki' ),
			'description' => esc_attr('Add your welcome message below', 'aniki' ),
			'section' => 'aniki_welcome_message_section',
			'setting' => 'aniki_welcome_message_setting',
		)
	);

	$wp_customize->add_setting (
		'aniki_grayscale_filter_setting',
		array(
			'default' => 'false',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_section("aniki_grayscale_filter_section", array(
		"title" => __("Grayscale mode", "aniki"),
		"priority" => 30,
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"aniki_grayscale_filter_setting",
		array(
			"label" => __("Garyscale mode:", "aniki"),
			"section" => "aniki_grayscale_filter_section",
			"settings" => "aniki_grayscale_filter_setting",
			'type'     => 'radio',
			'choices'  => array(
				'true'  => 'Yes',
				'false' => 'No',
			),
		)
	));
}
add_action( 'customize_register', 'aniki_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aniki_customize_preview_js() {
	wp_enqueue_script( 'aniki_customizer', get_template_directory_uri() . '/assets/scripts/inc/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aniki_customize_preview_js' );
