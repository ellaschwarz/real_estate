<?php
/*
Template Name: All posts
*/
?>

<?php get_header(); ?>

<h1> <?php echo get_cat_name(2); ?> </h1>

<?php

$args = [
     'post__in' => $object_id,
     'post_type' => 'objects',
     //'posts_per_page' => 5, 
     'category_name' => 'houses' // get posts by category name
 ];

 $object = new WP_query($args);

     $address = get_post_meta(get_the_ID(), 'address', true);
    $area = get_post_meta(get_the_ID(), 'area', true);
    $city = get_post_meta(get_the_ID(), 'city', true);
    $price = get_post_meta(get_the_ID(), 'price', true);
    $sqm = get_post_meta(get_the_ID(), 'm²', true);
    $rooms = get_post_meta(get_the_ID(), 'rooms', true);


if ($object ->have_posts()) : ?>
     <?php while ($object ->have_posts()) :
            $object ->the_post();
            $selected = get_post_meta(get_the_ID(), 'selected', true); ?>
                         <?php if ($selected === "Yes") : ?>
                         <div class="selected_post"> 
                         <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                              <div class="entry">	
                                   <?php the_content(); ?>
                                   <h4>Price: <?php echo get_post_meta(get_the_ID(), 'price', true); ?></h4>
                                   <h4>Address: <?php echo get_post_meta(get_the_ID(), 'address', true); ?></h4>
                                   <?php 
                                    wp_reset_postdata(); ?>
                              </div>
                         </div>
                         <?php endif;
     endwhile;
endif?>

<?php
if ($object ->have_posts()) : ?>
     <?php while ($object ->have_posts()) :
            $object ->the_post();
                 $selected = get_post_meta(get_the_ID(), 'selected', true); ?>
                         <?php if ($selected === "No") : ?>     
            <div class="post"> 
               <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
               <div class="entry">	
                                   <?php
                                        the_content();
                                        wp_reset_postdata(); ?>
              
              </div>
          </div>
     <?php 
     endif;
     endwhile;
     pagination_nav($object);
     wp_link_pages();
    

endif; ?>


<?php get_sidebar(); ?>
<div style = "clear:both"></div>	
<?php get_footer(); ?>