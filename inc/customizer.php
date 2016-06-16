<?php
/**
 * Presser Theme Customizer
 *
 * @package Pressed
 */

/**
 * Sanitize Text Input
 *
 * @since 1.0
 *
 * @return string
 */
function input_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitize Dropdown
 *
 * @since 1.0
 *
 * @return int
 */
function dropdown_sanitize_integer( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @return void
 */
function pressed_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', 'pressed_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pressed_customize_preview_js() {
	wp_enqueue_script( 'pressed_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), pressed_version_id(), true );
}

add_action( 'customize_preview_init', 'pressed_customize_preview_js' );

