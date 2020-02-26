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

    $object_id = get_post_meta(get_the_ID(), 'objectinfo', true);
    $address = get_post_meta(get_the_ID(), 'address', true);
    $city = get_post_meta(get_the_ID(), 'city', true);
    $price = get_post_meta(get_the_ID(), 'price', true);
    $sqm = get_post_meta(get_the_ID(), 'm²', true);
    $rooms = get_post_meta(get_the_ID(), 'rooms', true);
    $inspection_times = get_post_meta(get_the_ID(), 'inspection_times', true);


    $args = [
        'post__in' => $object_id,
        'post_type' => 'objects',
    ];

    $object = new WP_query($args);

    if ($object -> have_posts()) {
        while ($object -> have_posts()) {
            $object->the_post();
            
            echo '<h1 class="object_title"> ' . get_the_title() . '</h1>';
            ?>
            <div class="content_continer"
            <?php
            echo '<h5 class="object_content"> ' . get_the_content() . '</h5>';
            ?> 
            </div> <!-- content_container -->
            <?php
            echo '<p class="object_city"> ' . $city . '</p>';
            ?>
            <div class="info_container" 
            <?php
            echo '<p class="object_price"> Price: ' . $price . '</p>';
            echo '<p class="object_sqm"> m²: ' . $sqm . '</p>';
            echo '<p class="object_rooms"> Rooms: ' . $rooms . '</p>';
            echo '<p class="object_inspection_times"> Inspection Times: ' . $inspection_times . '</p>';
            ?>
             </div> <!-- info_container -->
             <?php
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
