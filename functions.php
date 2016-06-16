<?php
/**
 * Functions and definitions
 *
 * @package Pressed
 */

/** Define Theme Version */
define( 'THEME_VERSION', '0.9' );

/** Autoloader */
require_once 'vendor/autoload.php';


/** Defines custom Hybrid Core directory. */
define( 'HYBRID_DIR', __DIR__ . '/bower_components/hybrid-core/' );
define( 'HYBRID_URI', get_template_directory_uri() . '/bower_components/hybrid-core/' );

/** Load the Hybrid Core framework. */
require_once HYBRID_DIR . 'hybrid.php';
new Hybrid();

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', function() {

	( new \Pressed\Classes\Setup() )->addHooks();

	// Theme layouts.
	add_theme_support( 'theme-layouts', array( 'default' => is_rtl() ? '2c-r' :'2c-l' ) );

	// Enable custom template hierarchy.
	add_theme_support( 'hybrid-core-template-hierarchy' );

	// Translation setup
	load_theme_textdomain( 'pressed', get_template_directory() . '/languages' );

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
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' )
	);

});
