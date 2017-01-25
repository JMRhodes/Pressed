<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php hybrid_attr( 'head' ); ?>>
    <?php wp_head(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

<header <?php hybrid_attr( 'header' ); ?>>
    <div class="container">
        <?php
        get_template_part( 'components/branding' ); // Loads the components/site-branding.php template.

        hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template.
        ?>
    </div>
</header><!-- .header -->