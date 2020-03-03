<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpre
 */
?>

	</div><!-- #content -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php printf( __( 'Powered by %1$s.', 'wp-real-estate' ), '<a href="'.esc_url("https://inkhive.com/product/wp-real-estate/").'" rel="nofollow">WP Real Estate Theme</a>' ); ?>
			<span class="sep">
                			<?php echo ( get_theme_mod('wpre_footer_text') == '' ) ? ('&copy; '.date_i18n(__('Y','wp-real-estate')).' '.get_bloginfo('name').__('. All Rights Reserved. ','wp-real-estate')) : esc_html( get_theme_mod('wpre_footer_text') ); ?>
            </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->


<?php wp_footer(); ?>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
