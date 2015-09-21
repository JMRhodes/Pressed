<?php
/**
 * The template for displaying search results pages.
 *
 * @package Presser
 */

get_header(); ?>

<div class="container">
	<div class="row">

		<section id="primary" class="col-sm-8 content-area">
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php presser_archives_title( '<h1 class="page-title">', '</h1>' ); ?>
					</header><!-- .page-header -->
					
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', 'search' );
						?>

					<?php endwhile; ?>

					<?php presser_paginate(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>