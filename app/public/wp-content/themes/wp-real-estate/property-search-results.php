<?php
/**
 * The template for displaying search results, when the search if performed using the Advanced Search Option.
 * This template has been provided to work with WP Property Listings Plugin.
 * This file will not be executed if the Required plugin is not active.
 * (c) Rohit Tripathi 2017
 *
 * @package wpre
 */

$_name = $_GET['name'] != '' ? esc_html($_GET['name']) : '';
$_area = $_GET['area'] != '' ? esc_html($_GET['area']) : '';
$_minbed = $_GET['minbed'] != '' ? esc_html($_GET['minbed']) : '1';
$_maxbed = $_GET['maxbed'] != '' ? esc_html($_GET['maxbed']) : '6';
$_cmin = $_GET['mincost'] != '' ? esc_html($_GET['mincost']) : '1';
$_cmax = $_GET['maxcost'] != '' ? esc_html($_GET['maxcost']) : '99999999999';
$_type = $_GET['listing_type'] != '' ? esc_html($_GET['listing_type']) : '';

echo 'area : ',$_area,'name: ', $_name,'Type: ', $_type,'minbed: ',$_minbed, 'bed',$_maxbed,'cmin: ',$_cmin, 'cmax: ',$_cmax ;

echo 'Property';

get_header();?>

<div id="primary" class="content-area <?php apply_filters('wpre_primary-width', 'wpre_primary_class')?>">
    <main id="main" class="site-main" role="main">

        <?php
$p_args = array(
    'post_type' => 'objects', // your CPT
    // looks into everything with the keyword from your 'name field'
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'rooms',
            'value' => array($_minbed,$_maxbed),
            'compare' => 'BETWEEN',
        ),
        array(
            'key' => 'address',
            'value' => $_name,
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'area',
            'value' => $_area,
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'price',
            'value' => array($_cmin,$_cmax),
            'compare' => 'BETWEEN',
        ),
    ),
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $_type,
            'include_children' => true,
            'operator' => 'IN',
        ),
    ),
);
$propSearchQuery = new WP_Query($p_args);

?>

        <?php if ($propSearchQuery->have_posts()): ?>

        <header class="page-header">
            <h1 class="page-title"><?php _e('Search Results', 'wp-real-estate');?></h1>
        </header><!-- .page-header -->

        <?php /* Start the Loop */?>
        <?php while ($propSearchQuery->have_posts()): $propSearchQuery->the_post();?>

	        <article id="post-<?php the_ID();?>" <?php post_class();?>>
	            <div class="grid2-3">
	                <!-- post title -->
	                <h3>
	                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
	                </h3>
	                <!-- /post title -->

	            </div>
	            <!-- post thumbnail -->
	            <?php if (has_post_thumbnail()): // Check if thumbnail exists ?>
		            <div class="photo">
		                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
		                    <?php the_post_thumbnail('feadturedBlog', array('class' => 'polaroid')); // Declare pixel size you need inside the array ?>
		                </a>
		            </div>
		            <?php endif;?>
	            <!-- /post thumbnail -->
	            <div class="clear">
	                <div class="grid1-3 post-information">
	                    <!-- post details -->
	                    <span
	                        class="date"><strong><?php _e('Area: ', 'html5blank');?></strong><?php the_field('area');?></span><br />
	                    <span
	                        class="date"><strong><?php _e('Rooms: ', 'html5blank');?></strong><?php the_field('rooms');?></span><br />
	                    <span
	                        class="date"><strong><?php _e('m²: ', 'html5blank');?></strong><?php the_field('m²');?></span><br />
	                    <span
	                        class="author"><strong><?php _e('Price: ', 'html5blank');?></strong><?php the_field('price');?></span><br />
	                    <span
	                        class="author"><strong><?php _e('Inspection_times: ', 'html5blank');?></strong><?php the_field('inspection_times');?></span>
	                    <p><strong><?php _e('Category: ', 'html5blank');?></strong>
	                        <?php the_category(', '); // Separated by commas ?></p>
	                    <!-- /post details -->
	                </div>
	            </div>
	            <!--.clear-->
	            <?php // edit_post_link(); ?>
	        </article>

	        <?php endwhile;?>

        <?php wpre_pagination();?>

        <?php else: ?>

        <?php _e('No Properties were found with specified parameters. Please search using different parameters.', 'wp-real-estate')?>

        <?php endif;?>

    </main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar('left');?>
<?php get_footer();?>