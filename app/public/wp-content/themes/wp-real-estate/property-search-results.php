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
$_minbed = $_GET['minbed'] != '' ? esc_html($_GET['minbed']) : '1';
$_maxbed = $_GET['maxbed'] != '' ? esc_html($_GET['maxbed']) : '10';
$_cmin = $_GET['mincost'] != '' ? esc_html($_GET['mincost']) : '1';
$_cmax = $_GET['maxcost'] != '' ? esc_html($_GET['maxcost']) : '99999999999';
$_type = $_GET['listing_type'] != '' ? esc_html($_GET['listing_type']) : '';

$_list = explode(',',$_type);
get_header();
global $paged;
get_sidebar('left');?>
<div id="primary" class="content-area <?php apply_filters('wpre_primary-width', 'wpre_primary_class')?>">
    <main id="main" class="site-main" role="main">

        <?php
$p_args = array(
    'post_type' => 'objects', 
    'posts_per_page' => -1, 
    'paged' => $paged,
    // your CPT
    // looks into everything with the keyword from your 'name field'
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'rooms',
            'type' => 'numeric',
            'value' => array($_minbed,$_maxbed),
            'compare' => 'BETWEEN',
        ),
        array(array(
            'key' => 'address',
            'value' => $_name,
            'compare' => 'LIKE'
        ),'relation' => 'OR',
        array(
            'key' => 'area',
            'value' => $_name,
            'compare' => 'LIKE'
        ),'relation' => 'OR',
        array(
            'key' => 'city',
            'value' => $_name,
            'compare' => 'LIKE'
        )),
        array(
            'key' => 'price',
            'type' => 'numeric',
            'value' => array($_cmin,$_cmax),
            'compare' => 'BETWEEN',
        ),
    ), 
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $_list,
            'include_children' => true,
            'operator' => 'AND',
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
            <div class="container-fluid">
                <div class='row'>
                    <div class="photo col-md-5">
                        <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                            <?php the_post_thumbnail('medium', array('class' => 'polaroid')); // Declare pixel size you need inside the array ?>
                        </a>
                    </div>
                    <?php endif;?>
                    <!-- /post thumbnail -->
                        <!-- post details -->
                        <div class='col-md-7'>
                            <div class="container-fluid info_container">
                               <div class='row'>
                                    <p class="col-md-6 object_td">  <strong><?php _e('City: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"><?php the_field('city');?></p>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 object_td">  <strong><?php _e('Area: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"><?php the_field('area');?></p>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 object_td"> <strong><?php _e('Rooms: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"><?php the_field('rooms');?></p>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 object_td"> <strong><?php _e('m²: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"><?php the_field('m²');?></p>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 object_td"><strong> <?php _e('Price: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"><?php the_field('price');?></p>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 object_td"><strong> <?php _e('Inspection times: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"><?php the_field('inspection_times');?></p>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 object_td"><strong><?php _e('Category: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"> <?php the_category(', '); // Separated by commas ?></p>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 object_td"><strong><?php _e('Tags: ', 'html5blank');?></strong> </p>
                                    <p class="col-md-6"> <?php the_tags(''); // Separated by commas ?></p>
                                </div>
                            
                            </div>
                        </div>
                        <!-- /post details -->
                    </div>
                </div>
                <!--.clear-->
                <?php // edit_post_link(); ?>
        </article>

        <?php endwhile;?>

        <?php wpre_pagination();?>
       
        <?php else: ?>
        <div class='search-info'>
        <?php _e('No Properties were found with specified parameters. Please search using different parameters.', 'wp-real-estate')?>
        </div>
        <?php endif;?>

    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>