<?php
function wpre_customize_register_fpages($wp_customize) {
    //FEATURED Pages
    $wp_customize->add_section(
        'wpre_a_fpages_boxes',
        array(
            'title'     => __('Featured Pages','wp-real-estate'),
            'priority'  => 35,
            'panel' => 'wpre_featured_content_areas'
        )
    );

    $wp_customize->add_setting(
        'wpre_fpages_enable',
        array(
            'sanitize_callback' => 'wpre_sanitize_checkbox',
            'transport'      => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'wpre_fpages_enable', array(
            'settings' => 'wpre_fpages_enable',
            'label'    => __( 'Enable this section', 'wp-real-estate' ),
            'description'    => __( 'Show one or two of your Featured Content. This can be used to display a information about an Agent, or the company itself. The Featured Pages you choose below, must have a Featured Image, Title & Content. Content Should be less than 150 words for best results.', 'wp-real-estate' ),
            'section'  => 'wpre_a_fpages_boxes',
            'type'     => 'checkbox',
        )
    );

    for( $i = 1; $i <= 2; $i++ ) :

        $wp_customize->add_setting(
            'wpre_fpages_page_'.$i,
            array( 'sanitize_callback' => 'absint' )
        );

        $wp_customize->add_control(
            'wpre_fpages_page_'.$i, array(
                'settings' => 'wpre_fpages_page_'.$i,
                'label'    => __( 'Page ','wp-real-estate' ).$i,
                'description'    => __( 'Leave Blank to use only one Page','wp-real-estate' ),
                'section'  => 'wpre_a_fpages_boxes',
                'type'     => 'dropdown-pages',
                'allow_addition' => true,
            )
        );

        $wp_customize->add_setting(
            'wpre_fpages_page_url_'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'wpre_fpages_page_url_'.$i, array(
                'settings' => 'wpre_fpages_page_url_'.$i,
                'label'    => __( 'Custom URL ','wp-real-estate' ).$i,
                'description'    => __( 'Enter URL to link the Learn More button to some other page. Leave Blank to link to the page selected above or any external url. ','wp-real-estate' ),
                'section'  => 'wpre_a_fpages_boxes',
                'type'     => 'url',
            )
        );

    endfor;
}
add_action('customize_register', 'wpre_customize_register_fpages');