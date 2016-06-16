<?php
/**
 * The template for displaying all single posts.
 *
 * @package Pressed
 */

get_header(); ?>

<div class="container">
	<div class="row">

		<div class="col-sm-8 content" role="main">

			<?php 
			while ( have_posts() ) {
				the_post();

				// Loads the content/singular/content.php template.
				hybrid_get_content_template();

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			}
			?>

		</div><!-- .content -->

		<?php get_sidebar(); ?>

	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>