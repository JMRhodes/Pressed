<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Presser
 */

get_header(); ?>

	<div id="primary" class="col-sm-8 content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php presser_archives_title(); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content">

					<p><?php _e( 'It looks like the page you&rsquo;re looking for doesn&rsquo;t exist. Perhaps a quick look through these pages will help you find what you&rsquo;re looking for:', 'presser' ); ?></p>
					
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main_menu',
							'container_class' => 'entry-content-menu',
							'depth' => 1,
						)
					);
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
