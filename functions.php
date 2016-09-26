<?php
/**
 * Functions and definitions
 *
 * @package Pressed
 */

use Pressed\App\Setup;
use Pressed\App\Scripts;
use Pressed\App\HybridMods;

/**
 * Define Theme Version
 * Defines custom Hybrid Core directory.
 */
define( 'THEME_VERSION', '0.9' );
define( 'HYBRID_DIR', __DIR__ . '/vendor/justintadlock/hybrid-core/' );
define( 'HYBRID_URI', get_template_directory_uri() . '/vendor/justintadlock/hybrid-core/' );

/**
 * Requires Autoloader
 * Loads the Hybrid Core framework.
 */
require_once 'vendor/autoload.php';
require_once HYBRID_DIR . 'hybrid.php';

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', function () {

	new Hybrid();
	( new Setup() )->addHooks();
	( new Scripts() )->addHooks();
	( new HybridMods() )->addHooks();

	// Translation setup
	load_theme_textdomain( 'pressed', get_template_directory() . '/languages' );

	// Theme layouts.
	add_theme_support( 'theme-layouts', [ 'default' => is_rtl() ? 'sidebar-left' : 'sidebar' ] );

	// Enable custom template hierarchy.
	add_theme_support( 'hybrid-core-template-hierarchy' );

	// Add automatic feed links in header
	add_theme_support( 'automatic-feed-links' );

	// Add Post Thumbnail Image sizes and support
	add_theme_support( 'post-thumbnails' );

	// Switch default core markup to output valid HTML5.
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	] );

} );
