<?php
function wpre_customize_register_gfonts($wp_customize) {
    //Fonts
    $wp_customize->add_section(
        'wpre_typo_options',
        array(
            'title'     => __('Google Web Fonts','wp-real-estate'),
            'priority'  => 41,
            'panel' => 'wpre_design_panel'
        )
    );

    $font_array = array('Source Serif Pro','Montserrat','Open Sans','Droid Sans','Droid Serif','Roboto');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'wpre_title_font',
        array(
            'default'=> 'Montserrat',
            'sanitize_callback' => 'wpre_sanitize_gfont'
        )
    );

    function wpre_sanitize_gfont( $input ) {
        if ( in_array($input, array('Source Serif Pro','Montserrat','Open Sans','Droid Sans','Droid Serif','Roboto') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'wpre_title_font',array(
            'label' => __('Primary Font','wp-real-estate'),
            'settings' => 'wpre_title_font',
            'section'  => 'wpre_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'wpre_body_font',
        array(	'default'=> 'Source Serif Pro',
            'sanitize_callback' => 'wpre_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'wpre_body_font',array(
            'label' => __('Secondary Font','wp-real-estate'),
            'settings' => 'wpre_body_font',
            'section'  => 'wpre_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'wpre_customize_register_gfonts');