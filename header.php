<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php hybrid_attr( 'head' ); ?>>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header <?php hybrid_attr( 'header' ); ?>>
	<div class="container">
		<?php get_template_part( 'components/site-branding' ); // Loads the components/site-branding.php template. ?>

		<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>
	</div>
</header><!-- .header -->