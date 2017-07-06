<?php
/**
 * The Primary Site navigation
 *
 * @package CoCreateX
 */

// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'primary' ) ) {
    return;
}
?>

<nav id="site-navigation" role="navigation">
    <?php
    wp_nav_menu( [
        'theme_location' => 'primary'
    ] );
    ?>
</nav>