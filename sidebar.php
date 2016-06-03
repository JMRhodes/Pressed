<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @package Presser
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="col-sm-4 widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</div><!-- #secondary -->