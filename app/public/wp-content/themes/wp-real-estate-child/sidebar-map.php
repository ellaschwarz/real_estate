
<?php if ( is_active_sidebar( 'estate_sidebar_search_map' ) ) : ?>
	<div id="sidebar-head" class="widget-area  <?php apply_filters('wpre_secondary-width', 'wpre_secondary_class'); ?>"" role="complementary">
		<?php dynamic_sidebar( 'estate_sidebar_search_map' ); ?>
	</div><!-- #map-sidebar -->
<?php endif; ?>
