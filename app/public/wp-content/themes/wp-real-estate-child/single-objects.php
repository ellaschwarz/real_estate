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

  //  get_template_part('template-parts/content', get_post_type());
    get_template_part( '/modules/content/content', get_post_type());

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

   // echo do_shortcode('[sp_wpcarousel id="70"]');
  //  echo '<h1 class="object_title"> ' . get_the_title() . '</h1>';
    echo '<h2 class="object_city"> ' . $area . ', ' . $city . '</h2>';
    ?>
    <div class="main_container">
    <div class="content_container">
    <?php
 //   echo '<h5 class="object_content"> ' . get_the_content() . '</h5>';
    ?> 
    </div> <!-- content_container -->
    <div class="info_container" >
        <table class="info_container" >
            
    <?php
    echo '<tr><td class="object_td"> Price: ' . '</td>';
    echo '<td>' . $price . ' kr' . '</td></tr>';
    echo '<tr><td class="object_td"> m²: ' . '</td>';
    echo '<td >' . $sqm . '</td></tr>';
    echo '<tr><td class="object_td"> Rooms: ' . '</td>';
    echo '<td>' . $rooms . '</td></tr>';
    echo '<tr><td class="object_td"> Inspection Times: ' . '</td>';
    echo '<td> ' . $inspection_times . '</td></tr>';
    ?>
    </table>
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
get_footer();
