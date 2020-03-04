<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpre
 */

get_header(); ?>

	<div id="primary" class="content-areas <?php apply_filters('wpre_primary-width','wpre_primary_class') ?>">
		<main id="main" class="site-main" role="main">
		<?php 
		$args = [
        'post__in' => $object_id,
        'post_type' => 'objects',
    ];

		$object = new WP_query($args);
		
		 if ( $object->have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( $object->have_posts() ) : $object->the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 */
					do_action('wpre_blog_layout'); 
				?>

			<?php endwhile; ?>

			<?php wpre_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( '/modules/content/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
