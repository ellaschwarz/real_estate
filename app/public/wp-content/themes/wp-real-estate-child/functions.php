<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // Parentstyle in this case is wp-real-estate.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function estate_widgets(){
    register_sidebar([
        'name'          => __( ' Group A search sidebar left', 'real_estate' ),
        'id'            => 'estate_sidebar_search',
        'description'   => __( 'Sidebar for search', 'real_estate' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ]);
}
function estate_widgets_broker(){
    register_sidebar([
        'name'          => __( 'Group A broker sidebar', 'real_estate' ),
        'id'            => 'estate_sidebar_broker',
        'description'   => __( 'Sidebar for broker', 'real_estate' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ]);
}
function estate_widgets_map(){
    register_sidebar([
        'name'          => __( 'Group A sidebar for map', 'real_estate' ),
        'id'            => 'estate_sidebar_search_map',
        'description'   => __( 'Sidebar for Map', 'real_estate' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init','estate_widgets');
add_action('widgets_init','estate_widgets_broker');
add_action('widgets_init','estate_widgets_map');

function pagination_nav($wp_query) { ?>
        <nav class="pagination" role="navigation">
            <div class="nav-next"><?php next_posts_link( 'Next &rarr;', $wp_query->max_num_pages ); ?></div>
            <div class="nav-previous"><?php previous_posts_link( '&larr; Previous' ); ?></div>
        </nav>
<?php }  ?>
<!-- 
<?php

function my_pagination_rewrite() {
    add_rewrite_rule('/apartments/page/?([0-9]{1,})/?$', 'category-apartments.php?category_name=blog&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');

// add_action( 'pre_get_posts', function ( $q ) {

//     if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'objects' ) ) {

//         $q->set( 'posts_per_page', 5 );

//     }

<<<<<<< HEAD
});
 ?> -->
=======
// });
 ?>
>>>>>>> 9d45bd65ea742401905e800033164fc60d623c9c


