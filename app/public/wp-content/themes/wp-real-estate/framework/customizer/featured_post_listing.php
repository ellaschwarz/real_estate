<?php
function wpre_customize_register_fp_listing($wp_customize) {
    //FEATURED Posts (inherited from featured-news in css)
    $wp_customize->add_section(
        'wpre_a_fn_boxes',
        array(
            'title'     => __('Featured Posts (Boxes)','wp-real-estate'),
            'priority'  => 35,
            'panel' => 'wpre_featured_content_areas'
        )
    );

    //Change title if user has real estate plugin active.
    //This is done to make things more sensible for the user.
    if (function_exists('property_detail'))
        $wp_customize->get_section('wpre_a_fn_boxes')->title = __('Featured Listings (Boxes)','wp-real-estate');

    $wp_customize->add_setting(
        'wpre_fn_enable',
        array(
            'sanitize_callback' => 'wpre_sanitize_checkbox',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'wpre_fn_enable', array(
            'settings' => 'wpre_fn_enable',
            'label'    => __( 'Enable this section', 'wp-real-estate' ),
            'description'    => __( 'Show your Top 4 Posts from the selected category.', 'wp-real-estate' ),
            'section'  => 'wpre_a_fn_boxes',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'wpre_fn_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'wpre_fn_title', array(
            'settings' => 'wpre_fn_title',
            'label'    => __( 'Title','wp-real-estate' ),
            'description'    => __( 'Leave Blank to disable','wp-real-estate' ),
            'section'  => 'wpre_a_fn_boxes',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'wpre_fn_cat',
        array( 'sanitize_callback' => 'wpre_sanitize_category' )
    );

    $wp_customize->add_control(
        new Wpre_WP_Customize_Category_Control(
            $wp_customize,
            'wpre_fn_cat',
            array(
                'label'    => __('Posts Category.','wp-real-estate'),
                'settings' => 'wpre_fn_cat',
                'section'  => 'wpre_a_fn_boxes'
            )
        )
    );
}
add_action('customize_register', 'wpre_customize_register_fp_listing');