<?php
/**
 * The sidebar template file
 *
 * @package Pressed
 */
?>

<?php if ( is_active_sidebar( 'primary' ) ) : ?>
    <aside <?php hybrid_attr( 'sidebar', 'primary' ); ?>>
        <?php dynamic_sidebar( 'primary' ); // Displays the primary sidebar. ?>
    </aside><!-- #sidebar-primary -->
<?php endif; ?>