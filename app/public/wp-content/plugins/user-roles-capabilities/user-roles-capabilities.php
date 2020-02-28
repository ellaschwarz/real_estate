<?php

/**
 *  Plugin name:    User roles for real estate
 *  Description:    Plugin for managing capabilities for different WordPress roles.
 *  Author:         Alexander Wilson
 *  Version:        0.2
 *  Text Domain:    user-roles-capabilities
 */

/*
 *
 ** Register activation hooks
 *
 */
function alter_author_role() {
    global $wp_roles;
    $wp_roles->remove_cap( 'author', 'publish_posts' );
}
register_activation_hook( __FILE__, 'alter_author_role' );

function alter_editor_role() {
    global $wp_roles;
    $wp_roles->remove_cap( 'editor', 'delete_published_posts' );

}
register_activation_hook( __FILE__, 'alter_editor_role' );

/*
 *
 ** Register deactivation hooks
 *
 */

function remove_author_alteration()
{
    global $wp_roles;
    $wp_roles->add_cap( 'author', 'publish_posts' );
}
register_deactivation_hook( __FILE__, 'remove_author_alteration' );

function remove_editor_alteration()
{
    global $wp_roles;
    $wp_roles->add_cap( 'editor', 'delete_published_pages' );
}
register_deactivation_hook( __FILE__, 'remove_editor_alteration' );
