<?php
/**
 * Setup the WordPress core custom header feature.
 *
 * @package Presser
 */

/**
 *
 */
function presser_custom_background_setup() {
	$args = array(
		'default-color' => 'f7f7f7',
	);

	add_theme_support( 'custom-background', apply_filters( 'presser_custom_background_args', $args ) );
}
add_action( 'after_setup_theme', 'presser_custom_background_setup' );
