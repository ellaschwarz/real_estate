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

 $object = new WP_query($args); ?>

 <script src="https://kit.fontawesome.com/3a12e18fd4.js" crossorigin="anonymous"></script>


<?php  if ($object ->have_posts()) : ?>
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
                            <?php wp_reset_postdata(); ?>
          </div>
      </div>
                            <?php
                     endif;
 endwhile;
 pagination_nav($object);
endif; ?>

<div style = "clear:both"></div>	
<?php get_footer(); ?>