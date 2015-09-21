<?php
/**
 * @package Presser
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumb">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'presser' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'presser' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
			// translators: used between list items, there is a space after the comma
			$categories_list = get_the_category_list( __( ', ', 'presser' ) );
			if ( $categories_list ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'presser' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
			// translators: used between list items, there is a space after the comma
			$tags_list = get_the_tag_list( '', __( ', ', 'presser' ) );
			if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'presser' ), $tags_list ); ?>
			</span>
			<?php endif; ?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->