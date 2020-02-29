<?php
/*
Template Name: All posts
*/
?>

<?php get_header();

$args = [
     'post__in' => $object_id,
     'post_type' => 'objects',
 ];

 $object = new WP_query($args);


if($object ->have_posts()) : ?>
     <?php while($object ->have_posts()) : $object ->the_post(); ?>
          <div class="post"> 
               <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
               <div class="entry">	
                    <?php the_content(); 
                    wp_reset_postdata(); ?>
              
              </div>
          </div>
     <?php endwhile; ?>
<?php endif; ?>


<?php get_sidebar(); ?>
<div style = "clear:both"></div>	
<?php get_footer(); ?>