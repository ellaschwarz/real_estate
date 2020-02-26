<?php
function wpre_customize_register_layouts($wp_customize) {
    // Layout and Design
    $wp_customize->get_section('background_image')->panel = 'wpre_design_panel';
    $wp_customize->add_panel( 'wpre_design_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','wp-real-estate'),
    ) );

    $wp_customize->add_section(
        'wpre_design_options',
        array(
            'title'     => __('Blog Layout','wp-real-estate'),
            'priority'  => 0,
            'panel'     => 'wpre_design_panel'
        )
    );


    $wp_customize->add_setting(
        'wpre_blog_layout',
        array( 'sanitize_callback' => 'wpre_sanitize_blog_layout' )
    );

    function wpre_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','wp-real-estate') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'wpre_blog_layout',array(
            'label' => __('Select Layout','wp-real-estate'),
            'settings' => 'wpre_blog_layout',
            'section'  => 'wpre_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Standard Blog Layout','wp-real-estate'),
                'wp-real-estate' => __('WP Real Estate Theme Layout','wp-real-estate'),
            )
        )
    );

    $wp_customize->add_section(
        'wpre_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','wp-real-estate'),
            'priority'  => 0,
            'panel'     => 'wpre_design_panel'
        )
    );

    $wp_customize->add_setting(
        'wpre_disable_sidebar',
        array( 'sanitize_callback' => 'wpre_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'wpre_disable_sidebar', array(
            'settings' => 'wpre_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','wp-real-estate' ),
            'section'  => 'wpre_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'wpre_disable_sidebar_home',
        array( 'sanitize_callback' => 'wpre_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'wpre_disable_sidebar_home', array(
            'settings' => 'wpre_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','wp-real-estate' ),
            'section'  => 'wpre_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'wpre_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'wpre_disable_sidebar_front',
        array( 'sanitize_callback' => 'wpre_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'wpre_disable_sidebar_front', array(
            'settings' => 'wpre_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','wp-real-estate' ),
            'section'  => 'wpre_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'wpre_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'wpre_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'wpre_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'wpre_sidebar_width', array(
            'settings' => 'wpre_sidebar_width',
            'label'    => __( 'Sidebar Width','wp-real-estate' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','wp-real-estate'),
            'section'  => 'wpre_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'wpre_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function wpre_show_sidebar_options($control) {

        $option = $control->manager->get_setting('wpre_disable_sidebar');
        return $option->value() == false ;

    }

    function wpre_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    $wp_customize-> add_section(
        'wpre_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','wp-real-estate'),
            'description'	=> __('Enter your Own Copyright Text.','wp-real-estate'),
            'priority'		=> 11,
            'panel'			=> 'wpre_design_panel'
        )
    );

    $wp_customize->add_setting(
        'wpre_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'wpre_footer_text',
        array(
            'section' => 'wpre_custom_footer',
            'settings' => 'wpre_footer_text',
            'type' => 'text'
        )
    );
}
add_action('customize_register', 'wpre_customize_register_layouts');