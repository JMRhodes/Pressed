<?php
/**
 * The template for displaying the footer.
 *
 * @package CoCreateX
 */
?>

<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="footer__copyright">
            <?php
            printf(
                '&copy %1$s %2$s. ' . __( 'All Rights Reserved.', 'pressed' ),
                date( 'Y' ),
                get_bloginfo( 'name' )
            );
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>