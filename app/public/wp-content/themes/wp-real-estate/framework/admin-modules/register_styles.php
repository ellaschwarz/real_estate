<?php
/**
 * Enqueue scripts and styles.
 */
function wpre_scripts() {
    wp_enqueue_style( 'wpre-style', get_stylesheet_uri() );

    wp_enqueue_style('wpre-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('wpre_title_font', 'Montserrat') )).':100,300,400,700' );

    if (get_theme_mod('wpre_title_font','Montserrat') != get_theme_mod('wpre_body_font','Source Serif Pro') ) :
        wp_enqueue_style('wpre-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('wpre_body_font', 'Source Serif Pro') )).':100,300,400,700' );
    endif;

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'hover-css', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'wpre-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('wpre_skins', 'default').'.css', array(), null );

    wp_enqueue_script( 'wpre-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'wpre-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'wpre-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'wpre-custom-js', get_template_directory_uri() . '/js/custom.js', array('wpre-externaljs') );

    // Localize the script with new data
    $translation_array = array(
        'menu_text' => __( 'Navigation &hellip;', 'wp-real-estate' ),
    );
    wp_localize_script( 'wpre-externaljs', 'wpre_menu_obj', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'wpre_scripts' );