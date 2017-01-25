<?php

namespace Pressed\App;

/**
 * Class Setup
 *
 * @package Pressed\App
 */
class Setup {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'init', [ $this, 'registerMenus' ] );
        add_action( 'hybrid_register_layouts', [ $this, 'registerLayouts' ] );
        add_action( 'widgets_init', [ $this, 'registerSidebars' ], 5 );
    }

    /**kalamazoo
     * Registers nav menu locations.
     */
    public function registerMenus() {
        register_nav_menu( 'primary', __( 'Primary', 'pressed' ) );
    }

    /**
     * Registers layouts.
     */
    public function registerLayouts() {
        hybrid_register_layout( 'full', [
            'label' => __( '1 Column', 'pressed' ),
            'image' => '%s/assets/images/layouts/1c.svg',
        ] );
        hybrid_register_layout( 'sidebar', [
            'label' => __( 'Content / Sidebar', 'pressed' ),
            'image' => '%s/assets/images/layouts/2c-l.svg',
        ] );
        hybrid_register_layout( 'sidebar-left', [
            'label' => __( 'Sidebar / Content', 'pressed' ),
            'image' => '%s/assets/images/layouts/2c-r.svg',
        ] );
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