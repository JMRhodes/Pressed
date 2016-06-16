<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pressed
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<header class="header" role="banner">
		<div class="container">
			<div class="branding">
				<h1 class="branding__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="branding__description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<nav class="navigation" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main_menu',
					)
				);
				?>
			</nav><!-- .navigation -->
		</div>
	</header><!-- .header -->