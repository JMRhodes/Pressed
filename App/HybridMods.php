<?php

namespace Pressed\App;

use Pressed\App\Interfaces\WordPressHooks;

/**
 * Class HybridMods
 * Hybrid Core compatibility and modifications.
 *
 * @package Pressed\App
 */
class HybridMods implements WordPressHooks {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_filter( 'hybrid_attr_header', [ $this, 'attrHeaderContent' ], 10, 2 );
        add_filter( 'hybrid_attr_branding', [ $this, 'attrBrandingContent' ], 10, 2 );
        add_filter( 'hybrid_attr_primary', [ $this, 'attrPrimaryContent' ], 10, 2 );
        add_filter( 'hybrid_attr_footer', [ $this, 'attrFooterContent' ], 10, 2 );
        add_filter( 'hybrid_content_template_hierarchy', [ $this, 'contentTemplateHierarchy' ] );
    }

    /**
     * Sets the header container ID/class.
     *
     * @param $attr
     * @param  string $context
     *
     * @return array
     */
    public function attrHeaderContent( array $attr, $context = '' ) {
        $attr['id']    = 'header';
        $attr['class'] = 'header';

        return $attr;
    }

    /**
     * Sets the branding container ID/class.
     *
     * @param $attr
     * @param  string $context
     *
     * @return array
     */
    public function attrBrandingContent( array $attr, $context = '' ) {
        $attr['id']    = 'branding';
        $attr['class'] = 'branding';

        return $attr;
    }

    /**
     * Sets the main container ID/class.
     *
     * @param $attr
     * @param  string $context
     *
     * @return array
     */
    public function attrPrimaryContent( array $attr, $context = '' ) {
        $attr['id']    = 'primary';
        $attr['class'] = 'content-area';

        switch ( $context ) {
            case 'full' :
                $attr['class'] .= ' col-sm-12';
                break;
            default:
                $attr['class'] .= ' col-sm-8';
        }

        return $attr;
    }

    /**
     * Sets the footer container ID/class.
     *
     * @param $attr
     * @param  string $context
     *
     * @return array
     */
    public function attrFooterContent( array $attr, $context = '' ) {
        $attr['id']    = 'footer';
        $attr['class'] = 'footer';

        return $attr;
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