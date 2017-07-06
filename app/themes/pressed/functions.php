<?php
/**
 * Functions and definitions
 *
 * @package CoCreateX
 */

use PRSSD\App\Core\Init;
use PRSSD\App\Setup;
use PRSSD\App\Scripts;
use PRSSD\App\Shortcodes;
use PRSSD\App\Attachments\Media;
use PRSSD\App\Fields\AdvancedCustomFields;

/**
 * Define Theme Version
 * Define Theme directories
 * Defines custom Hybrid Core directories.
 */
define( 'THEME_VERSION', '1.0.0' );
define( 'PRESSED_THEME_PATH', trailingslashit( get_template_directory() ) );
define( 'PRESSED_THEME_DIR_URI', trailingslashit( get_template_directory_uri() ) );

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', function () {

    ( new Init() )
        ->add( new Setup() )
        ->add( new Scripts() )
        ->add( new Media() )
        ->add( new Shortcodes() )
        ->add( new AdvancedCustomFields() )
        ->initialize();

    // Translation setup
    load_theme_textdomain( 'pressed', PRESSED_THEME_PATH . '/languages' );

    // Add automatic feed links in header
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

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