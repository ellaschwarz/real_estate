<?php
/*
Template Name: All posts
*/
?>

<?php get_header();?>

<h1> <?php echo get_cat_name(2); ?> </h1>

<?php

global $paged;

$args = [
     'post__in' => $object_id,
     'post_type' => 'objects',
     'posts_per_page' => 5,
     'category_name' => 'houses', // get posts by category name
     'paged' => $paged
 ];

 $object = new WP_query($args);

if ($object ->have_posts()) : ?>
         
          <?php while ($object ->have_posts()) :
                $object ->the_post();
                $selected = get_post_meta(get_the_ID(), 'selected', true); ?>
                         <?php if ($selected === "Yes") : ?>
                                <?php for ($i=0; $i<1; $i++) { ?>
                         <div class="selected_post"> 
                              <div class="carousel_category">
                                    <?php the_content(); ?>
                         </div>
                         <div class="entry">	
                                   <div class="title_area_city">
                                   <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                   <h4><i class="fas fa-home"></i><?php echo get_post_meta(get_the_ID(), 'area', true); ?> , 
                                        <?php echo get_post_meta(get_the_ID(), 'city', true); ?> </h4>
                                        </div>
                                        
                                        <h4 class="price">Price: <?php echo get_post_meta(get_the_ID(), 'price', true); ?> kr</h4>
                                        <h4 class="m2"> m²: <?php echo get_post_meta(get_the_ID(), 'm²', true); ?></h4>
                                        <h4 class="rooms"> Rooms: <?php echo get_post_meta(get_the_ID(), 'rooms', true); ?></h4>
                                    <?php
                                    wp_reset_postdata(); ?>
                              </div>
                         </div>
                                <?php };
                         endif;
          endwhile;
endif?>


<script src="https://kit.fontawesome.com/3a12e18fd4.js" crossorigin="anonymous"></script>
<?php
if ($object ->have_posts()) : ?>
     <?php while ($object ->have_posts()) :
            $object ->the_post();
                 $selected = get_post_meta(get_the_ID(), 'selected', true); ?>
                         <?php if ($selected === "No") : ?>     
            <div class="post"> 
                 <div class='photo_category'>
                                <?php the_post_thumbnail(array(512, 340)); ?>
               </div>
               <div class="entry_post">                            
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <h4><?php echo get_post_meta(get_the_ID(), 'area', true); ?> , 
                                <?php echo get_post_meta(get_the_ID(), 'city', true); ?> </h4>
                    <h4>Price: <?php echo get_post_meta(get_the_ID(), 'price', true); ?> kr</h4>
                    <h4> m²: <?php echo get_post_meta(get_the_ID(), 'm²', true); ?></h4>
                    <h4> Rooms: <?php echo get_post_meta(get_the_ID(), 'rooms', true); ?></h4>
                    <i class="fas fa-home"></i>
                                <?php wp_reset_postdata(); ?>
              </div>
          </div>
                                <?php
                         endif;
     endwhile;
     pagination_nav($object);
endif; ?>


<?php get_sidebar(); ?>
<div style = "clear:both"></div>	
<?php get_footer(); ?>