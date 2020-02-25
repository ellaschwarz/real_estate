<?php
/*
** Function to Automatically Display the Thumbnails, and placeholder if no thumbnail available.
*/
add_filter( 'post_thumbnail_html', 'wpre_new_thumb_sizes', 10, 4 );
function wpre_new_thumb_sizes( $html, $id, $thumb_id, $size ) {
    // Check to see if we are on a singular view.
    if ( ! is_singular() ) :
        // let's check to see if the post has a featured image.
        if ( ! get_post_thumbnail_id( $id ) ) {
            // if we don't have one, create a fallback for just the wpre-pop-thumb thumbnails.
            if ( 'wpre-pop-thumb' == $size || 'wpre-thumb' == $size ) {
                return  '<img src="' . get_template_directory_uri() . '/assets/images/placeholder2.jpg" />';
            }
            if ( 'wpre-sq-thumb' == $size ) {
                return  '<img src="' . get_template_directory_uri() . '/assets/images/placeholder-sq.jpg" />';
            }
            // simple message if there is no thumbnail at all.
            return '<h2>'.__('I do not have an image','wp-real-estate').'</h2>';
        }
    endif;
    // return our set featured image.
    return wp_get_attachment_image( $thumb_id, $size );
}

/*
** Function to Use the Property search page, when the Property Search is used.
*/
function wpre_search_tmpl( $template ) {
    if( isset($_REQUEST['search']) == 'property' ) {
        require(get_template_directory().'/property-search-results.php');
        die();
    }
    return $template;
}
add_action('init', 'wpre_search_tmpl');