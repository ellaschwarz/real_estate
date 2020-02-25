<?php

/**
 *  Plugin name:    Brookers
 *  Description:    Shorthand for showing brokers.
 *  Author:         Alexander Wilson
 *  Version:        0.4
 *  Text Domain:    brookers
 */


function get_and_print_out_employees()
{
    $args = [
    'order'   => 'DESC',
    'role' => 'Administrator',
];
$authors = get_users( $args );

$cards = '<h1>Our brookers</h1>';
$cards .= "<div class='cards_group'>";

    foreach ($authors as $author)
    {
        $cards .= "<div class='brooker'>";
            $cards .= "<img class='brooker-image' src='https://placekitten.com/690/300' alt='brooker'>";
            $cards .= "<h4 class='card-header'>Brooker</h4>";
            $cards .= "<p>$author->display_name</p>";
            $cards .= "<h4 class='card-header'>Email</h4>";
            $cards .= "<p>$author->user_email</p>";
        $cards .= '</div>';
    }

$cards .= '</div>';
return $cards;

}
add_shortcode('employees', 'get_and_print_out_employees');
