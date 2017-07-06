<?php

namespace PRSSD\App;

use PRSSD\App\Interfaces\WordPressHooks;

/**
 * Class Setup
 *
 * @package PRSSD\App
 */
class Setup implements WordPressHooks {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'init', [ $this, 'registerMenus' ] );
        add_action( 'widgets_init', [ $this, 'registerSidebars' ] );
    }

    /**
     * Registers nav menu locations.
     */
    public function registerMenus() {
        register_nav_menu( 'primary', __( 'Primary', 'pressed' ) );
    }

    /**
     * Registers sidebars.
     */
    public function registerSidebars() {
        register_sidebar( [
            'id'          => 'primary',
            'name'        => __( 'Sidebar', 'pressed' ),
            'description' => __( 'Main sidebar area displayed on right side of page via trigger.', 'pressed' ),
        ] );
    }
}