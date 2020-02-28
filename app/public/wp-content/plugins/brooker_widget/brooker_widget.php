<?php

/*
Plugin Name: Realestate Broker - widgets
Plugin URI:
Description: Add a Broker into widget
Version: 0.1.0
Author: Pat
Author URI:
Text Domain: Broker
 */

if (!defined('ABSPATH')) {
    die();
}

/**
 * Adds Foo_Widget widget.
 */
class Realestate_Broker_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'Brooker List', // Base ID
            esc_html__('Broker List', 'text_domain'), // Name
            array('description' => esc_html__('Display different brokers in the widget', 'text_domain')) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];?>
        <h2 class='text-primary'><?php echo esc_html($instance['title']); ?></h2>
        <?php

        $args = [
            'order' => 'DESC',
            'role' => 'Author',
        ];
        $authors = get_users($args);
        $cards = '<h1>Our brokers</h1>';
        $cards .= "<ul class='sidebar-list'>";
        foreach ($authors as $author) {
            //Setting size to 204 from 96 since the higher the size, the less blurry image.
            $author_avatar = get_avatar_url($author->user_email, ['size' => 204]);
            $cards .= "<li class='sidebar brooker sidebar-class'>";
            $cards .= '<img class="brooker-image" src="' . $author_avatar . '" alt="brooker">';
            $cards .= "<div class='class-content'>";
            $cards .= "<h4 class='card-header'>Brooker</h4>";
            $cards .= "<p>$author->user_nicename</p>";
            $cards .= "<h4 class='card-header'>Email</h4>";
            $cards .= "<p>$author->user_email</p>";
            $cards .= "</div>";
            $cards .= '</li>';
        }
        $cards .= '</ul>';
        echo $cards;

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'text_domain');

        $quantity = !empty($instance['quantity']) ? $instance['quantity'] : esc_html__('1', 'text_domain');
        ?>
<p>
    <label
        for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain');?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
        value="<?php echo esc_attr($title); ?>">
</p>

<p>
    <label
        for="<?php echo esc_attr($this->get_field_id('quantity')); ?>"><?php esc_attr_e('Amount of broker to Display   :', 'text_domain');?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('quantity')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="number"
        value="<?php echo esc_attr($quantity); ?>" min='0'>
</p>
<?php
}

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';

        $instance['quantity'] = (!empty($new_instance['quantity'])) ? sanitize_text_field($new_instance['quantity']) : '';
        return $instance;
    }

} // class Foo_Widget
// register Foo_Widget widget
function broker_list_widget()
{
    register_widget('Realestate_Broker_Widget');
}
add_action('widgets_init', 'broker_list_widget');