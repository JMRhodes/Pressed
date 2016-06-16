<?php

namespace Pressed\Classes;

/**
 * Class HybridMods
 * Hybrid Core compatibility and modifications.
 *
 * @package Pressed\Classes
 */
class HybridMods {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_filter( 'hybrid_content_template_hierarchy', array( $this, 'contentTemplateHierarchy' ) );
    }

    /**
     * Search the template paths and replace them with singular and archive versions.
     *
     * @param string $templates
     *
     * @return string
     */
    public function contentTemplateHierarchy( $templates ) {

        if ( is_singular() || is_attachment() ) {
            $templates = str_replace( 'content/', 'content/singular/', $templates );
        } else {
            $templates = str_replace( 'content/', 'content/archive/', $templates );
        }

        return $templates;
    }
}