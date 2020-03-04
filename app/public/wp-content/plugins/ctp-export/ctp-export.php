<?php 

/**
 *  Plugin name:    CTP-export
 *  Description:    Export of CTP
 *  Author:         Ella Schwarz
 *  Version:        1.0
 *  Text Domain:    ctp-export
 */


function cptui_register_my_cpts_objects() {

/**
 * Post Type: objects.
 */

$labels = [
    "name" => __( "objects", "custom-post-type-ui" ),
    "singular_name" => __( "object", "custom-post-type-ui" ),
];

$args = [
    "label" => __( "objects", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "objects", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    'has_archive' => true,
    "taxonomies" => [ "category", "post_tag" ],
];

register_post_type( "objects", $args );
}

add_action( 'init', 'cptui_register_my_cpts_objects' );
