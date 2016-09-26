<?php
/**
 * The Breadcrumb navigation
 *
 * @package Pressed
 */

if ( current_theme_supports( 'breadcrumb-trail' ) ) {

	breadcrumb_trail( [
			'container'     => 'nav',
			'show_browse'   => false,
			'show_on_front' => true,
	] );

}