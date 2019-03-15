<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aniki
 */

?>
</div>
<!-- #content -->
<footer id="colophon" class="site-footer section-fullwidth">
	<div class="row">
		<div class="columns small-12">
			
			<?php if ( has_nav_menu( 'primary' ) ): ?>
			<div class="menu-primary-footer">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); ?>
			</div>
			<?php endif; ?>

			<!-- .menu-primary-container -->
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'aniki' ) ); ?>">
					<?php printf( esc_html__( 'Proudly powered by %s', 'aniki' ), 'WordPress' ); ?>
				</a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Developed by %1$s.', 'aniki' ),'<a href="https://devrix.com/">DevriX</a>' ); ?>
			</div>
			<!-- .site-info -->
		</div>
		<!-- .small-12 -->
	</div>
	<!-- .row -->
</footer>
<!-- #colophon -->
</div>
<!-- #page -->
<?php wp_footer(); ?>
</body>

</html>
