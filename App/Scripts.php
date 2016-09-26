<?php

namespace Pressed\App;

/**
 * Class Scripts
 *
 * @package Pressed\App
 */
class Scripts {

	/**
	 * Add class hooks.
	 */
	public function addHooks() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueStyles' ] );
	}

	/**
	 * Load scripts for the front end.
	 */
	public function enqueueScripts() {
		wp_enqueue_script(
			'pressed',
			get_template_directory_uri() . '/assets/js/dist/theme.min.js',
			[ ],
			THEME_VERSION,
			true
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Load stylesheets for the front end.
	 */
	public function enqueueStyles() {
		wp_enqueue_style(
			'pressed',
			get_stylesheet_uri(),
			[ ],
			THEME_VERSION
		);
	}
}