<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pressed
 */

get_header(); ?>

<div class="container">
	<div class="row">
	
		<div class="col-sm-8 content" role="main">

			<header class="page-header">
				<?php the_archive_title( '<h1 class="hdg hdg--1">', '</h1>' ); ?>
			</header><!-- .page-header -->

			<?php 
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();

					// Loads the content/archive/content.php template.
					hybrid_get_content_template();
				}
			} else {
				// Loads the content/content-none.php template.
				get_template_part( 'content/content', 'none' );
			}
			?>
			
		</div><!-- .content -->

		<?php get_sidebar(); ?>

	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
