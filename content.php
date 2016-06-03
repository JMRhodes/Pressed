<?php
/**
 * @package Presser
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry__thumb">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<header class="entry__header">
		<?php the_title( sprintf( '<h1 class="hdg hdg--1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__content">
		<?php 
		the_content();

		wp_link_pages([
			'before' => '<div class="page-links">' . __( 'Pages:', 'presser' ),
			'after'  => '</div>',
		]);
		?>
	</div><!-- .entry__content -->

	<footer class="entry__footer">
		<?php 
		// Hide category and tag text for pages on Search
		if ( 'post' == get_post_type() ) {

			// translators: used between list items, there is a space after the comma
			$categories_list = get_the_category_list( __( ', ', 'presser' ) );

			if ( $categories_list ) {
				printf( __( '<span>Posted in %1$s</span>', 'presser' ), $categories_list );
			}

			// translators: used between list items, there is a space after the comma
			$tags_list = get_the_tag_list( '', __( ', ', 'presser' ) );

			if ( $tags_list ) {
				printf( __( '<span>Tagged %1$s</span>', 'presser' ), $tags_list );
			}

		}
		?>
	</footer><!-- .entry__footer -->
	
</article><!-- #post-## -->