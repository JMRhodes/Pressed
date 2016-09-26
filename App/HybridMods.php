<?php

namespace Pressed\App;

/**
 * Class HybridMods
 * Hybrid Core compatibility and modifications.
 *
 * @package Pressed\App
 */
class HybridMods {

	/**
	 * Add class hooks.
	 */
	public function addHooks() {
		add_filter( 'hybrid_attr_primary', [ $this, 'attrPrimaryContent' ], 10, 2 );
		add_filter( 'hybrid_content_template_hierarchy', [ $this, 'contentTemplateHierarchy' ] );
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
		$attr['class'] = 'content-area col-sm-8';

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