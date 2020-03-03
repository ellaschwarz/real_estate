<?php
/*
Template Name: All posts
*/
?>

<?php get_header();
// 
// query_posts(array(
// 'category_name' => 'my-category-slug', // get posts by category name
// 'posts_per_page' => -1 // all posts
// ));
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
   //  'post__in' => $object_id,
     'post_type' => 'objects',
    // 'posts_per_page' => 5 
    'posts_per_page' => 5,
    'paged' => $paged,

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
     <?php endwhile; ?>
     <?php
pagination_nav($object);
// next_posts_link() usage with max_num_pages
next_posts_link( 'Older Entries', $object->max_num_pages );
previous_posts_link( 'Newer Entries' );
?>
<?php endif; ?>
<div style = "clear:both"></div>	
<?php get_footer(); ?>