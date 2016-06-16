<?php
/**
 * The template for displaying the footer.
 *
 * @package Pressed
 */
?>	
	
	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="footer__copyright">
				<?php printf(
					// Translators: 1 is current year, 2 is site name/link.
					__( 'Copyright &#169; %1$s %2$s', 'pressed' ),
					date_i18n( 'Y' ), hybrid_get_site_link()
				); ?>
			</div><!-- .copyright -->
			<div class="footer__credit">
				<?php printf(
					// Translators: theme name/link.
					__( 'Powered by %1$s', 'pressed' ), hybrid_get_theme_link()
				); ?>
			</div><!-- .credit -->
		</div>
	</footer><!-- .footer -->

<?php wp_footer(); ?>

</body>
</html>