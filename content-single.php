<?php
/**
 * @package Presser
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'presser' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		// translators: used between list items, there is a space after the comma
		$category_list = get_the_category_list( __( ', ', 'presser' ) );

		// translators: used between list items, there is a space after the comma
		$tag_list = get_the_tag_list( '', __( ', ', 'presser' ) );

		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'presser' );
		} else {
			$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'presser' );
		}

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink()
		);
		?>

		<?php edit_post_link( __( 'Edit', 'presser' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
