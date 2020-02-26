<?php

/**
 *  Plugin name:    User roles for real estate
 *  Description:    Plugin for managing capabilities for different WordPress roles.
 *  Author:         Alexander Wilson
 *  Version:        0.1
 *  Text Domain:    user-roles-capabilities
 */

function alter_author_role() {
    global $wp_roles;
    $wp_roles->remove_cap( 'author', 'publish_posts' );
}
register_activation_hook( __FILE__, 'alter_author_role' );

function remove_author_alteration()
{
    global $wp_roles;
    $wp_roles->add_cap( 'author', 'publish_posts' );
}
register_deactivation_hook( __FILE__, 'remove_author_alteration' );
