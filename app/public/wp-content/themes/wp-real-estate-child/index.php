<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpre
 */
get_header(); ?>

	<div id="primary" class="content-areas <?php apply_filters('wpre_primary-width','wpre_primary_class') ?>">
		<main id="main" class="site-main <?php apply_filters('wpre_main-class', 'wpre_get_main_class'); ?>" role="main">
		<?php if (is_home() ) : ?>
			<div class="col-md-12 index-title"><div class="section-title title-font"><?php _e('Latest Listings','wp-real-estate'); ?></div></div>
		<?php endif; ?>
        <?php
        $currentPaged = get_query_var('paged');

        $args = [
            'post_type'      => 'objects',
            'posts_per_page' => 5,
            'paged'          => $currentPaged,
            /*Change paged to a number to see it working on the first page.*/
        ];
        $objectsQuery = new WP_Query( $args );

        ?>
		<?php if ( $objectsQuery->have_posts() ) : ?>
			<?php while ( $objectsQuery->have_posts() ) : $objectsQuery->the_post(); ?>
				<?php do_action('wpre_blog_layout'); ?>
			<?php endwhile;

            echo paginate_links([
                'total' => $objectsQuery->max_num_pages
            ]); ?>

		<?php else : ?>

			<?php get_template_part( '/modules/content/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
