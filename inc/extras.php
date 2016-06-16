<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Pressed
 */

/**
 * Post Page Pagination
 *
 * @since 1.0
 *
 * @param bool $container
 *
 * @return bool|string
 */
function presser_paginate( $container = false ) {
	ob_start();
	?>
	<div class="clearfix"></div>

	<div class="pagination">
		<?php echo( $container ? '<div class="pagination-inner">' : '' );  ?>
		<?php previous_posts_link( '<div class="dashicons dashicons-arrow-left-alt2"></div>' ); ?>
		<?php global $wp_query; ?>

		<div class="pagenums">
			<?php
			$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
			$current = sprintf( '%02s', $paged );
			$last    = sprintf( '%02s', $wp_query->max_num_pages );
			?>
			<div class="diag"></div>
			<span class="left"><?php echo intval( $current ); ?></span>
			<span class="right"><?php echo intval( $last ); ?></span>
		</div>

		<?php next_posts_link( '<div class="dashicons dashicons-arrow-right-alt2"></div>' ); ?>
		<?php echo( $container ? '</div>' : '' );  ?>
	</div>
	<?php
	$paginate = ob_get_contents();
	ob_end_clean();

	if ( $last > 1 ) {
		return $paginate;
	}

	return false;
}

/**
 * Custom Excerpt Length
 *
 * @param $length
 *
 * @return int
 */
function presser_new_excerpt_length( $length ) {
	return 35;
}

/**
 * Custom Excerpt More
 *
 * @param $more
 *
 * @return string
 */
function presser_new_excerpt_more( $more ) {
	return ' ...';
}

/**
 * @param string $length_callback
 * @param string $more_callback
 */
function wpe_excerpt( $length_callback = '', $more_callback = '' ) {
	global $post;

	if ( function_exists( $length_callback ) ) {
		add_filter( 'excerpt_length', $length_callback );
	}
	if ( function_exists( $more_callback ) ) {
		add_filter( 'excerpt_more', $more_callback );
	}
	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
	$output = '<p class="excerpt">' . $output . '</p>';
	echo $output; 
}
