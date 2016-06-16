<?php
/**
 * Functions and definitions
 *
 * @package Pressed
 */

define( 'THEME_VERSION', '0.9' );

/** Autoloader */
require_once 'vendor/autoload.php';

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', function() {

	( new \Pressed\Classes\Setup() )->addHooks();

	// Translation setup
	load_theme_textdomain( 'presser', get_template_directory() . '/languages' );

	// Add automatic feed links in header
	add_theme_support( 'automatic-feed-links' );

	// Add Post Thumbnail Image sizes and support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-xl', 1400, 9999 );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 
		'html5', 
		array(
			'search-form', 
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

});
