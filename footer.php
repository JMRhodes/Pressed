<?php
/**
 * The template for displaying the footer.
 *
 * @package Presser
 */
?>	
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'presser' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'presser' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'presser' ), 'presser', '<a href="http://westwerk.com/" rel="designer">Westwerk</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>