<?php
/**
 * Template part for displaying the entry footer.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pressed
 */
?>

<footer class="entry__footer">
    <?php
    hybrid_post_terms( [
        'taxonomy' => 'category',
        'text'     => __( 'Posted in: %s', 'pressed' )
    ] );

    edit_post_link( __( 'Edit', 'pressed' ), '<span class="edit-link">', '</span>' );
    ?>
</footer><!-- .entry__footer -->