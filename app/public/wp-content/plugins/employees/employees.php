<?php

/**
 *  Plugin name:    Employees
 *  Description:    Shorthand for showing brokers.
 *  Author:         Alexander Wilson
 *  Version:        0.1
 *  Text Domain:    employees
 */


function get_and_print_out_employees()
{
    $args = [
    'order'   => 'DESC',
    'role' => 'Administrator',
];
$authors = get_users( $args );
?>
<div class="cards_group">
<?php
    foreach ($authors as $author)
    {
        ?>
        <div class="brooker">
            <img class="brooker-image" src="https://placekitten.com/690/300" alt="brooker">
            <h3><?php echo "Brooker: $author->display_name"; ?></h3>
            <p><?php echo "Email: $author->user_email"; ?></p>
        </div>
        <?php
    }
?>
</div>
<?php
}
add_shortcode('employees', 'get_and_print_out_employees');
