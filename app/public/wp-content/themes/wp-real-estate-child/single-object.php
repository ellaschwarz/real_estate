<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @link http://codex.wordpress.org/Template_Tags/get_posts#Usage
 *
 * @package real_estate
 */


get_header();
?>

<div id="primary" class="content-area">
<main id="main" class="site-main">

<?php

while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', get_post_type());
    
    $objectinfo = get_post_meta(get_the_ID(), 'objectinfo', true);
    //var_dump($capital);
    echo '<h3>' . $objectinfo . '</h3>';

    $object_id = get_post_meta(get_the_ID(), 'objectinfo', true);
    $address = get_post_meta(get_the_ID(), 'address', true);


    $args = [
        'post__in' => $object_id,
        'post_type' => 'objects',
    ];

    $object = get_posts($args);

    if($object) :
        foreach($object as $obj):
    ?>

        <!-- Content -->
        <div class="col-xs-9">
      <h1><a href="<?php echo get_permalink($obj->ID); ?>"><?php echo get_the_title($obj->ID); ?></a></h1>
      <?php echo $trimmed = wp_trim_words(get_the_content($obj->ID), 15, '...'); ?>
    </div>
  </div>

  <?php endforeach; wp_reset_postdata(); ?>
<?php endif; ?>
    
<?php 
    if ($object -> have_posts()) {
        while ($object -> have_posts()) {
            $object->the_post();
            echo '<p class="object"> Object: ' . get_the_title() . '</p>';
        }

        wp_reset_postdata();
    }

    //$continent_id = get_post_meta( get_the_ID(), 'continent', true);

// $object = get_post_meta(get_the_ID(), 'objects', true);
// $args = [
//         'post__in' => $objectID,
//         'post_type' => 'object'
//         ];

// $allObjects = new WP_Query($args);

// echo "<h2>Composer</h2>";
// if ($allObjects->have_posts()) {
//     while ($allObjects->have_posts()) {
//         $allObjects->the_post();
//         echo '<p class ="allObjects">' . get_the_title() . '</p>';
//     }
//     wp_reset_postdata();
// }

    the_post_navigation();

// If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
endwhile; // End of the loop.
?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
