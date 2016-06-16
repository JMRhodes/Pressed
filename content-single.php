<?php
/**
 * @package Pressed
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry__header">
		<?php the_title( '<h1 class="hdg hdg--1">', '</h1>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__content">
		<?php 
		the_content();

		wp_link_pages([
			'before' => '<div class="page-links">' . __( 'Pages:', 'pressed' ),
			'after'  => '</div>',
		]);
		?>
	</div><!-- .entry__content -->

	<footer class="entry__footer">
		<?php
		// translators: used between list items, there is a space after the comma
		$category_list = get_the_category_list( __( ', ', 'pressed' ) );

		// translators: used between list items, there is a space after the comma
		$tag_list = get_the_tag_list( '', __( ', ', 'pressed' ) );

		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'pressed' );
		} else {
			$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'pressed' );
		}

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink()
		);
		
		edit_post_link( __( 'Edit', 'pressed' ), '<span class="edit-link">', '</span>' ); 
		?>
	</footer><!-- .entry__footer -->

</article><!-- #post-## -->
