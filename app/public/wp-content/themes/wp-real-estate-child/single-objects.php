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
    $area = get_post_meta(get_the_ID(), 'area', true);
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
        }

        wp_reset_postdata();
    }

    echo do_shortcode('[sp_wpcarousel id="70"]');
    echo '<h1 class="object_title"> ' . get_the_title() . '</h1>';
    echo '<p class="object_city"> ' . $area . ', ' . $city . '</p>';
    ?>
    <div class="main_container">
    <div class="content_container"
    <?php
    echo '<h5 class="object_content"> ' . get_the_content() . '</h5>';
    ?> 
    </div> <!-- content_container -->
    <div class="info_container" 
    <?php
    echo '<p class="object_price"> Price: ' . $price . ' kr' . '</p>';
    echo '<p class="object_sqm"> m²: ' . $sqm . '</p>';
    echo '<p class="object_rooms"> Rooms: ' . $rooms . '</p>';
    echo '<p class="object_inspection_times"> Inspection Times: ' . $inspection_times . '</p>';
    ?>
     </div> <!-- info_container -->
     </div> <!-- main_container -->
     <?php

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
