<?php
/**
 * The Primary Site navigation
 *
 * @package Pressed
 */
if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>
		<?php
		wp_nav_menu( [
			'theme_location' => 'main_menu',
		] );
		?>
	</nav><!-- #menu-primary -->

<?php endif; // End check for menu. ?>