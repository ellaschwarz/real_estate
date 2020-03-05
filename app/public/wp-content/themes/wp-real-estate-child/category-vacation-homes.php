<?php
/*
Template Name: All posts
*/
?>

<?php get_header();?>

<h1> <?php echo get_cat_name(4); ?> </h1>

<?php
global $paged;

$args = [
     'post__in' => $object_id,
     'post_type' => 'objects',
     'posts_per_page' => 1,
     'category_name' => 'vacation-homes', // get posts by category name
     'meta_key' => 'selected',
     'meta_value' => 'Yes'
 ];

 $object = new WP_query($args);

if ($object ->have_posts()) : ?>
         
     <?php while ($object ->have_posts()) :
            $object ->the_post(); ?>

                    <div class="selected_post"><a href="<?php the_permalink(); ?>">
                         <div class="carousel_category">
                                <?php the_content(); ?>
                    </div>

                    <div class="entry">	
                              <div class="title_area_city">
                              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                              <h4><i class="fas fa-igloo"></i><?php echo get_post_meta(get_the_ID(), 'area', true);?> , 
                                   <?php echo get_post_meta(get_the_ID(), 'city', true); ?> </h4>
                              </div>                                 
                                   <h4 class="price">Price: <?php echo get_post_meta(get_the_ID(), 'price', true); ?> kr</h4>
                                   <h4 class="m2"> m²: <?php echo get_post_meta(get_the_ID(), 'm²', true); ?></h4>
                                   <h4 class="rooms"> Rooms: <?php echo get_post_meta(get_the_ID(), 'rooms', true); ?></h4>
                                <?php wp_reset_postdata(); ?>
                         </div>
     </a> </div>
               <?php
     endwhile;
endif?>

<?php
$args2 = [
     'post__in' => $object_id,
     'post_type' => 'objects',
     'posts_per_page' => 4,
     'category_name' => 'vacation-homes',
     'paged' => $paged
 ];

 $object = new WP_query($args2);
?>

<script src="https://kit.fontawesome.com/3a12e18fd4.js" crossorigin="anonymous"></script>

<?php
if ($object ->have_posts()) : ?>
     <?php while ($object ->have_posts()) :
            $object ->the_post(); ?>
 
       <div class="post"> 
            <div class='photo_category'>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(512, 340)); ?></a>
          </div>
          <div class="entry_post">                                 
               <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
               <h4><?php echo get_post_meta(get_the_ID(), 'area', true); ?> , 
                           <?php echo get_post_meta(get_the_ID(), 'city', true); ?> </h4>
               <h4>Price: <?php echo get_post_meta(get_the_ID(), 'price', true); ?> kr</h4>
               <h4> m²: <?php echo get_post_meta(get_the_ID(), 'm²', true); ?></h4>
               <h4> Rooms: <?php echo get_post_meta(get_the_ID(), 'rooms', true); ?></h4>
               <i class="fas fa-igloo"></i>
                           <?php wp_reset_postdata(); ?>
         </div>
     </div>
               <?php
     endwhile;
     pagination_nav($object);
endif; ?>

<div style = "clear:both"></div>	
<?php get_footer(); ?>