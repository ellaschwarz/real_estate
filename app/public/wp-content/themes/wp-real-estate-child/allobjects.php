<?php
/*
Template Name: All posts
*/
?>

<?php get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'objects',
    'posts_per_page' => 5,
    'paged' => $paged
 ];

 $object = new WP_query($args); ?>

 <script src="https://kit.fontawesome.com/3a12e18fd4.js" crossorigin="anonymous"></script>


<?php  if ($object ->have_posts()) : ?>
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
                            <?php wp_reset_postdata(); ?>
          </div>
      </div>
                            <?php
     endwhile;
     pagination_nav($object);
endif; ?>

<div style = "clear:both"></div>	
<?php get_footer(); ?>