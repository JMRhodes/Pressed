<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Presser
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

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 */
function presser_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'presser' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'presser_wp_title', 10, 2 );

/**
 * Title shim for sites older than WordPress 4.1.
 *
 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
 * @todo Remove this function when WordPress 4.3 is released.
 */
function presser_render_title() {
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
}

add_action( 'wp_head', 'presser_render_title' );
