<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php hybrid_attr( 'head' ); ?>>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header <?php hybrid_attr( 'header' ); ?>>
		<div class="container">
			<div class="branding">
				<h1 class="branding__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="branding__description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>
		</div>
	</header><!-- .header -->