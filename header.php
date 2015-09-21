<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Presser
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() . '/assets/js/html5shiv.min.js' ); ?>"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() . '/assets/js/respond.min.js' ); ?>"></script>
	<![endif]-->
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<header id="masthead" class="site-header col-sm-12" role="banner">
		<div class="container">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main_menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div class="container">
		<div class="row">