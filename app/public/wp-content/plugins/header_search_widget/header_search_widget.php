<?php

/*
Plugin Name: Realestate Search Header - widgets
Plugin URI:
Description: Add a search header widget
Version: 0.1.0
Author: Pat
 */

if (!defined('ABSPATH')) {
    die();
}

/**
 * Adds Foo_Widget widget.
 */
class Realestate_Header_Search_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'Search header', // Base ID
            esc_html__('Search Header', 'text_domain'), // Name
            array('description' => esc_html__('Display search into header', 'text_domain')) // Args
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
        <div id="property-search-form" class="container">
        <div class="psf-inner">	
        <form method="get" id="property-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
            <input type="hidden" name="search" value="object">
            <fieldset>
            <label for="name" class=""><?php _e( 'Search: ', 'wp-real-estate' ); ?></label>
            <input type="text" value="<?php echo (isset($_GET['name'])) ? $_GET['name'] : ''?>" placeholder="<?php _e( 'Property Address, Area or City', 'wp-real-estate' ); ?>" name="name" id="name" />
            </fieldset>
        
            <fieldset>
            <label for="listing_type" class=""><?php _e( 'Option: ', 'wp-real-estate' ); ?></label>
            <input type="text" value="<?php echo (isset($_GET['listing_type'])) ? $_GET['listing_type'] : ''?>" placeholder="<?php _e( 'Balcony,city,etc.', 'wp-real-estate' ); ?>" name="listing_type" id="tags" />
          <!--   <select name="listing_type" id="listing_type">
            <?php 
              $terms = get_terms( array(
                'taxonomy' => 'post_tag',
                'hide_empty' => false,
            ) );
                if(!empty($terms ) && !is_wp_error($terms)){
                    foreach($terms as $term){?>
                        <option <?php echo (isset($_GET['listing_type']) && $_GET['listing_type'] == $term->name) ? 'selected' : ''?> value="<?php echo $term->slug ?>"><?php _e( $term->name , 'wp-real-estate' ); ?></option>
                    <?php 
                    }
                }
            ?>
            </select> -->
            </fieldset>
        
            <fieldset>
            <label for="minbed" class=""><?php _e( 'Rooms (Min):', 'wp-real-estate' ); ?></label>
            <select name="minbed" id="minbed">
                <option selected <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '1') ? 'selected' : ''?> value="1"><?php _e( '1', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '2') ? 'selected' : ''?> value="2"><?php _e( '2', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '3') ? 'selected' : ''?> value="3"><?php _e( '3', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '4') ? 'selected' : ''?> value="4"><?php _e( '4', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '5') ? 'selected' : ''?> value="5"><?php _e( '5', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '6') ? 'selected' : ''?> value="6"><?php _e( '6', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '6') ? 'selected' : ''?> value="6"><?php _e( '6', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '7') ? 'selected' : ''?> value="7"><?php _e( '7', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '8') ? 'selected' : ''?> value="8"><?php _e( '8', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '9') ? 'selected' : ''?> value="9"><?php _e( '9', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '10') ? 'selected' : ''?> value="10"><?php _e( '10', 'wp-real-estate' ); ?></option>
            </select>
            </fieldset>
            <fieldset>
            <label for="maxbed" class=""><?php _e( 'Rooms(Max):', 'wp-real-estate' ); ?></label>
            <select name="maxbed" id="maxbed">
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '1') ? 'selected' : ''?> value="1"><?php _e( '1', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '2') ? 'selected' : ''?> value="2"><?php _e( '2', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '3') ? 'selected' : ''?> value="3"><?php _e( '3', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '4') ? 'selected' : ''?> value="4"><?php _e( '4', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '5') ? 'selected' : ''?> value="5"><?php _e( '5', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '6') ? 'selected' : ''?> value="6"><?php _e( '6', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '7') ? 'selected' : ''?> value="7"><?php _e( '7', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '8') ? 'selected' : ''?> value="8"><?php _e( '8', 'wp-real-estate' ); ?></option>
                <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '9') ? 'selected' : ''?> value="9"><?php _e( '9', 'wp-real-estate' ); ?></option>
                <option selected <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '10') ? 'selected' : ''?> value="10"><?php _e( '10', 'wp-real-estate' ); ?></option>
            </select>
            </fieldset>
        
            <fieldset>
            <label for="mincost" class=""><?php _e( 'Price (Min) : ', 'wp-real-estate' ); ?></label>
            <input type="number" step="0.1" value="<?php echo (isset($_GET['mincost'])) ? $_GET['mincost'] : ''?>" placeholder="<?php _e( '1 (no symbols)', 'wp-real-estate' ); ?>" name="mincost" id="mincost" />
            </fieldset>
        
            <fieldset>
            <label for="maxcost" class=""><?php _e( 'Price (Max) : ', 'wp-real-estate' ); ?></label>
            <input type="number" step="0.1" value="<?php echo (isset($_GET['maxcost'])) ? $_GET['maxcost'] : ''?>" placeholder="<?php _e( '99999999 (no symbols)', 'wp-real-estate' ); ?>" name="maxcost" id="maxcost" />
            </fieldset>
        
            <fieldset>
            <input type="submit" id="searchsubmit" value="Search!" />
            </fieldset>
        </form>
        </div>
        </div> 
    <?php 
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
        ?>
<p>
    <label
        for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain');?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
        value="<?php echo esc_attr($title); ?>">
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
        return $instance;
    }

} // class Foo_Widget
// register Foo_Widget widget
function search_header_widget()
{
    register_widget('Realestate_Header_Search_Widget');
}
add_action('widgets_init', 'search_header_widget');