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
    'role' => 'Author',
];
$authors = get_users( $args );

$cards = '<h1>Our brokers</h1>';
$cards .= "<div class='cards_group'>";

    foreach ($authors as $author)
    {
        //Setting size to 204 from 96 since the higher the size, the less blurry image.
        $author_avatar = get_avatar_url($author->user_email, ['size' => 204]);
        $cards .= "<div class='brooker'>";
            $cards .= '<img class="brooker-image" src="'.$author_avatar.'" alt="broker">';
            $cards .= "<h4 class='card-header'>Broker</h4>";
            $cards .= "<p>$author->user_nicename</p>";
            $cards .= "<h4 class='card-header'>Email</h4>";
            $cards .= "<p>$author->user_email</p>";
        $cards .= '</div>';
    }

$cards .= '</div>';
return $cards;

}
add_shortcode('employees', 'get_and_print_out_employees');
