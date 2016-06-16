<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Pressed
 */

get_header(); ?>

<div class="container">
	<div class="row">
	
		<div class="col-sm-8 content content--404" role="main">

			<header class="entry__header">
				<h1 class="hdg hdg--1">
					<?php _e( 'Page Not Found', 'pressed' ); ?>
				</h1>
			</header><!-- .entry__header -->

			<div class="entry__content">

				<?php 
				_e( '<p>It looks like the page you&rsquo;re looking for doesn&rsquo;t exist. Perhaps a quick look through these pages will help you find what you&rsquo;re looking for:</p>', 'pressed' );
				
				wp_nav_menu(
					array(
						'theme_location' => 'main_menu',
						'container_class' => 'entry-content-menu',
						'depth' => 1,
					)
				);
				?>

			</div><!-- .page-content -->

		</div><!-- .content -->

		<?php get_sidebar(); ?>

	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>