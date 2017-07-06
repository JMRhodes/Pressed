<?php

namespace PRSSD\App;

use PRSSD\App\Interfaces\WordPressHooks;

/**
 * Class Scripts
 *
 * @package PRSSD\App
 */
class Scripts implements WordPressHooks {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ], 5 );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueueStyles' ], 5 );
    }

    /**
     * Load scripts for the front end.
     */
    public function enqueueScripts() {
        wp_enqueue_script(
            'pressed-vendors',
            PRESSED_THEME_DIR_URI . 'build/js/vendor.min.js',
            [ 'jquery' ],
            THEME_VERSION,
            true
        );

        wp_enqueue_script(
            'pressed-theme',
            PRESSED_THEME_DIR_URI . 'build/js/theme.min.js',
            [ 'pressed-vendors' ],
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
            'pressed-fonts',
            '//fonts.googleapis.com/css?family=Roboto:300,400,500,700',
            [],
            THEME_VERSION
        );

        wp_enqueue_style(
            'pressed-styles',
            PRESSED_THEME_DIR_URI . 'build/css/theme.min.css',
            [ 'pressed-fonts' ],
            THEME_VERSION
        );
    }
}