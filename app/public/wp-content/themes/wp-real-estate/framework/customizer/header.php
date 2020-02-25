<?php
function wpre_customize_register_header_settings($wp_customize) {
    //Logo Settings
    $wp_customize->get_section( 'title_tagline' )->title = __( 'Title, Tagline & Logo', 'wp-real-estate' );
    $wp_customize->get_section( 'title_tagline' )->panel = 'wpre_header_panel';
    $wp_customize->remove_control('display_header_text');

    $wp_customize->add_panel(
        'wpre_header_panel',
        array(
            'title'     => __('Header Settings','wp-real-estate'),
            'priority'  => 30,
        )
    );

    $wp_customize->add_setting(
        'wpre_hide_title_tagline',
        array(
            'sanitize_callback' => 'wpre_sanitize_checkbox',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'wpre_hide_title_tagline', array(
            'settings' => 'wpre_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'wp-real-estate' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_section(
        'wpre_header_content',
        array(
            'title'     => __('Header Content','wp-real-estate'),
            'panel' => 'wpre_header_panel',
            'priority'  => 30,
        )
    );

    $wp_customize->add_setting(
        'wpre_hinfo_enable',
        array(
            'sanitize_callback' => 'wpre_sanitize_checkbox',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'wpre_hinfo_enable', array(
            'settings' => 'wpre_hinfo_enable',
            'label'    => __( 'Enable Header Content', 'wp-real-estate' ),
            'description' => __('If you enable header content, It will be displayed over the header image also make sure you have added a header image.'),
            'section'  => 'wpre_header_content',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'wpre_header_content_page',
        array( 'sanitize_callback' => 'absint' )
    );

    $wp_customize->add_control(
        'wpre_header_content_page', array(
            'settings' => 'wpre_header_content_page',
            'label'    => __( 'Fetch Content from Page','wp-real-estate' ),
            'description'    => __( 'The Page you Select Must have only <br/>- Short Title (1-2 Words) <br />- 1-2 Lines of Content.','wp-real-estate' ),
            'section'  => 'wpre_header_content',
            'type'     => 'dropdown-pages',
            'allow_addition' => true,
            'active_callback' => 'wpre_show_header_content_options',
        )
    );

    $wp_customize->add_setting(
        'wpre_header_btn',
        array(
            'default'=> __('Learn More','wp-real-estate'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'wpre_header_btn', array(
            'settings' => 'wpre_header_btn',
            'label'    => __( 'Button Text','wp-real-estate' ),
            'description'    => __( 'Enter the text for the Call to Action Button. e.g. Learn More, Buy Now, Sign Up, etc.','wp-real-estate' ),
            'section'  => 'wpre_header_content',
            'type'     => 'text',
            'active_callback' => 'wpre_show_header_content_options',
        )
    );

    $wp_customize->add_setting(
        'wpre_header_url',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'wpre_header_url', array(
            'settings' => 'wpre_header_url',
            'label'    => __( 'Button URL','wp-real-estate' ),
            'description'    => __( 'Enter URL to link the Learn More button to some other page or external url. Leave Blank to link to the page selected above. ','wp-real-estate' ),
            'section'  => 'wpre_header_content',
            'type'     => 'url',
            'active_callback' => 'wpre_show_header_content_options',
        )
    );

    /* Active Callback Function */
    function wpre_show_header_content_options($control) {

        $option = $control->manager->get_setting('wpre_hinfo_enable');
        return $option->value() == true ;

    }

    //Add the Header Image section to Header Settings for uniformity
    $wp_customize->get_section('header_image')->panel = 'wpre_header_panel';

}
add_action('customize_register', 'wpre_customize_register_header_settings');