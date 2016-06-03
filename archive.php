<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Presser
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

					get_template_part( 'content', get_post_format() ); 
				}
			} else {
				get_template_part( 'content', 'none' );
			}
			?>
			
		</div><!-- .content -->

		<?php get_sidebar(); ?>

	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
