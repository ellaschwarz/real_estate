<?php
/*
** Function to Trim the length of Excerpt and More
*/
function wpre_excerpt_length( $length ) {
    return 56;
}
add_filter( 'excerpt_length', 'wpre_excerpt_length', 999 );

function wpre_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpre_excerpt_more' );
