<?php
/**
 * The template for displaying the footer.
 *
 * @package Pressed
 */
?>	
	
	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="footer__info">
				<?php printf( __( 'Theme: %1$s by %2$s.', 'pressed' ), 'Pressed', '<a href="http://domain.com/" rel="designer">Domain</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- .footer -->

<?php wp_footer(); ?>

</body>
</html>