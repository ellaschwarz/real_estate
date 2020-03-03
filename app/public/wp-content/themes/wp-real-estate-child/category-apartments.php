<?php
/*
Template Name: All apartments
*/
?>

<?php get_header();

// <?php
// query_posts(array(
// 'category_name' => 'my-category-slug', // get posts by category name
// 'posts_per_page' => -1 // all posts
// ));


$args = [
     'post__in' => $object_id,
     'post_type' => 'objects',
     'posts_per_page' => 5, 
     'category_name' => 'apartments' // get posts by category name


 ];

 $object = new WP_query($args);


if ($object ->have_posts()) : ?>
     <?php while($object ->have_posts()) : $object ->the_post(); ?>
          <div class="post"> 
               <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
               <div class="entry">	
                    <?php the_content(); 
                    wp_reset_postdata(); ?>
              
              </div>
          </div>
     <?php endwhile; 
     pagination_nav($object);
 endif; ?>


<?php 
pagination_nav();
get_sidebar(); ?>
<div style = "clear:both"></div>	
<?php 
get_footer(); ?>