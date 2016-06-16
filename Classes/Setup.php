<?php

namespace Pressed\Classes;

/**
 * Class Setup
 *
 * @package Pressed\Classes
 */
class Setup {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'init', array( $this, 'registerMenus' ) );
        add_action( 'widgets_init', array( $this, 'registerSidebars' ), 5 );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ), 5 );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueueStyles' ), 5 );
    }

    /**
     * Registers nav menu locations.
     */
    public function registerMenus() {
        register_nav_menu( 'primary', _x( 'Primary', 'nav menu location', 'pressed' ) );
    }

    /**
     * Registers sidebars.
     */
    public function registerSidebars() {

        register_sidebar( array(
            'id'            => 'sidebar',
            'name'          => __( 'Sidebar', 'pressed' ),
            'description'   => __( 'Main sidebar area displayed on right side of page via trigger.', 'pressed' ),
        ) );

    }

    /**
     * Load scripts for the front end.
     */
    public function enqueueScripts() {

        wp_enqueue_script( 
            'pressed', 
            get_template_directory_uri() . '/assets/js/dist/theme.min.js', 
            array(), 
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
            array(), 
            THEME_VERSION 
        );

    }
}