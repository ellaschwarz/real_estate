<?php
function wpre_customize_register_social($wp_customize) {
    // Social Icons
    $wp_customize->add_section('wpre_social_section', array(
        'title' => __('Social Icons','wp-real-estate'),
        'priority' => 20 ,
        'panel' => 'wpre_header_panel'
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','wp-real-estate'),
        'facebook' => __('Facebook','wp-real-estate'),
        'twitter' => __('Twitter','wp-real-estate'),
        'google-plus' => __('Google Plus','wp-real-estate'),
        'instagram' => __('Instagram','wp-real-estate'),
        'rss' => __('RSS Feeds','wp-real-estate'),
        'pinterest-p' => __('Pinterest','wp-real-estate'),
        'vimeo-square' => __('Vimeo','wp-real-estate'),
        'youtube' => __('Youtube','wp-real-estate'),
        'flickr' => __('Flickr','wp-real-estate'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'wpre_social_'.$x, array(
            'sanitize_callback' => 'wpre_sanitize_social',
            'default' => 'none',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control( 'wpre_social_'.$x, array(
            'settings' => 'wpre_social_'.$x,
            'label' => __('Icon ','wp-real-estate').$x,
            'section' => 'wpre_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'wpre_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'wpre_social_url'.$x, array(
            'settings' => 'wpre_social_url'.$x,
            'description' => __('Icon ','wp-real-estate').$x.__(' Url','wp-real-estate'),
            'section' => 'wpre_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function wpre_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'pinterest-p',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'wpre_customize_register_social');