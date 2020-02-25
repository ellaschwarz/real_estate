<?php
function wpre_customize_register_skin($wp_customize) {
    $wp_customize->get_section('colors')->title =  __('Theme Skins & Colors','wp-real-estate');
    $wp_customize->get_section('colors')->panel =  'wpre_design_panel';
    //Replace Header Text Color with, separate colors for Title and Description

    //$wp_customize->remove_section('colors');
    $wp_customize->remove_setting('header_textcolor');

    $wp_customize->add_setting('wpre_site_titlecolor', array(
        'default'     => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'wpre_site_titlecolor', array(
            'label' => __('Site Title Color','wp-real-estate'),
            'section' => 'colors',
            'settings' => 'wpre_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('wpre_header_desccolor', array(
        'default'     => '#777777',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'wpre_header_desccolor', array(
            'label' => __('Site Tagline Color','wp-real-estate'),
            'section' => 'colors',
            'settings' => 'wpre_header_desccolor',
            'type' => 'color'
        ) )
    );
    //Select the Default Theme Skin
    $wp_customize->add_setting(
        'wpre_skins',
        array(
            'default'	=> 'default',
            'sanitize_callback' => 'wpre_sanitize_skin',
            'transport'	=> 'refresh'
        )
    );

    if(!function_exists('wpre_skin_array')){
        function wpre_skin_array(){
            return array(
                '#be2819' => 'default',
                '#e48d48' => 'orange',
                '#34c94a' => 'green',
            );
        }
    }

    $wpre_skin_array = wpre_skin_array();


    $wp_customize->add_control(
        new WPRE_Skin_Chooser(
            $wp_customize,
            'wpre_skins',
            array(
                'settings'		=> 'wpre_skins',
                'section'		=> 'colors',
                'label'			=> __( 'Select Skins', 'wp-real-estate' ),
                'type'			=> 'skins',
                'choices'		=> $wpre_skin_array,
            )
        )
    );

    function wpre_sanitize_skin( $input ) {
        if ( in_array($input, array('default','orange','green') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'wpre_customize_register_skin');