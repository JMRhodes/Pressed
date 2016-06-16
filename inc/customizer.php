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
function presser_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', 'presser_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function presser_customize_preview_js() {
	wp_enqueue_script( 'presser_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), presser_version_id(), true );
}

add_action( 'customize_preview_init', 'presser_customize_preview_js' );

