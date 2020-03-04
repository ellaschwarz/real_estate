<?php
/*
Template Name: All posts
*/
?>

<?php get_header(); 
 
?>

<h1> <?php echo get_cat_name(4); ?> </h1>

<?php
global $paged;


$args = [
     'post__in' => $object_id,
     'post_type' => 'objects',
     //'posts_per_page' => 5, 
     'category_name' => 'vacation-homes', // get posts by category name
     'paged' => $paged
 ];

 $object = new WP_query($args);

 	$the_page = get_query_var('paged'); //<!-- tell wordpress this is paged
     $object->query_posts('cat=4&posts_per_page=5&paged='.$the_page); //<-- set cat= to the numeric category
    


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

endif; 


?>

<?php 

get_sidebar(); ?>
<div style = "clear:both"></div>	
<?php 
get_footer(); ?>