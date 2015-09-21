<?php
/**
 * Functions and definitions
 *
 * @package Presser
 */

define( 'THEME_VERSION', '0.9' );

function presser_version_id() {
	if ( WP_DEBUG ) {
		return time();
	}

	return THEME_VERSION;
}

/**
 * Custom content width for jetpack galleries.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 770;
}

/**
 * Theme Setup
 */
function presser_setup() {
	// Translation setup
	load_theme_textdomain( 'presser', get_template_directory() . '/languages' );

	// Add visual editor to resemble the theme styles.
	add_editor_style( array( 'style-editor.css', presser_fonts_url() ) );

	// Add automatic feed links in header
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	));

	// Add Post Thumbnail Image sizes and support
	add_theme_support( 'post-thumbnails' );

	// Register custom menus
	register_nav_menus( array(
		'main_menu' => __( 'Main Menu', 'presser' )
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));
}
add_action( 'after_setup_theme', 'presser_setup' );

/**
 * Load additional files and functions.
 */
require get_template_directory() . '/inc/custom-background.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Returns the Google font stylesheet URL, if available.
 */
function presser_fonts_url() {
	$query_args = array(
		'family' => 'Open+Sans:400,500,600',
	);

	return esc_url( add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
}

/**
 * Required Theme Styles
 */
function presser_theme_styles() {
	// wp_enqueue_style( 'dashicons' );
	// wp_enqueue_style( 'presser-fonts', presser_fonts_url(), array(), null );
	wp_enqueue_style( 'presser', get_stylesheet_uri(), array(), presser_version_id() );
}
add_action( 'wp_enqueue_scripts', 'presser_theme_styles' );

/**
 * Required Theme Scripts
 */
function presser_theme_scripts() {
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', null, presser_version_id(), true );
    wp_enqueue_script( 'presser', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), presser_version_id(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'presser_theme_scripts' );

/**
 * Modify main query to show Category set in Theme Options if set.
 *
 * @param WP_Query $query
 * @return WP_Query
 */
function presser_main_query_pre_get_posts( $query ) {
	// Bail if Home page template, not the home page, not a query, not main query
	if ( ! is_home() || ! is_a( $query, 'WP_Query' ) || ! $query->is_main_query() ) {
		return;
	}

	$query->set( 'paged', presser_get_paged_query_var() );
}
add_action( 'pre_get_posts', 'presser_main_query_pre_get_posts' );

/**
 * Register widget areas.
 */
function presser_register_widget_areas() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'presser' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar area displayed on right side of page via trigger.', 'presser' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'presser_register_widget_areas' );
