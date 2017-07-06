<?php

namespace PRSSD\App;

use PRSSD\App\Interfaces\WordPressHooks;

/**
 * Class Shortcodes
 *
 * @package PRSSD\App
 */
class Shortcodes implements WordPressHooks {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_shortcode( 'button', [ $this, 'button' ] );
    }

    /**
     * Generate button markup
     *
     * @param $atts
     * @param null $content
     *
     * @return string
     */
    public function button( $atts, $content = null ) {
        $atts = shortcode_atts( [
            'link'    => '#',
            'target'  => '_blank',
            'classes' => 'btn',
            'style'   => 'btn-default',
            'block'   => ''
        ], $atts, 'button' );

        $classes = $atts['classes'] . ' ' . $atts['style'];
        $classes .= ( ! empty( $atts['block'] ) && 'true' === $atts['block'] ) ? ' btn-block' : '';

        return "<a class=\"{$classes}\" href=\"{$atts['link']}\" target=\"{$atts['target']}\">{$content}</a>";
    }
}