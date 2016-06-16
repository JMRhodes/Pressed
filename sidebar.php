<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @package Pressed
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="col-sm-4 sidebar" role="complementary">

	<?php dynamic_sidebar( 'sidebar' ); ?>

</div><!-- #secondary -->