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
        'name'          => __( 'Real Estate Group A sidebar Theme', 'real_estate' ),
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
        'name'          => __( 'Broker Group A sidebar', 'real_estate' ),
        'id'            => 'estate_sidebar_broker',
        'description'   => __( 'Sidebar for broker', 'real_estate' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init','estate_widgets');
add_action('widgets_init','estate_widgets_broker');

function pagination_nav() {
    global $wp_query;
 
    if ( $wp_query->max_num_pages > 1 ) { ?>
        <nav class="pagination" role="navigation">
            <div class="nav-previous"><?php next_posts_link( '&larr; Older posts' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
        </nav>
<?php }
}