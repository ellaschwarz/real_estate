<?php
function wpre_customize_register_misc_scripts($wp_customize) {
    $wp_customize->add_section(
        'wpre_sec_upgrade',
        array(
            'title'     => __('WP Real Estate - Help & Support','wp-real-estate'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'wpre_upgrade',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Wpre_WP_Customize_Upgrade_Control(
            $wp_customize,
            'wpre_upgrade',
            array(
                'label' => __('Recommended Plugin','wp-real-estate'),
                'description' => __('WP Real Estate is a powerful Real Estate Theme to list properties and make them searchable. But to Add that functionality this theme requires the WP Property Listings Plugin. Download & Install the WP Property Listings Plugin from WordPress.org Below. </br><br/>
	            <a target="_blank" href="https://wordpress.org/plugins/wp-property-listings/">WP Property Listings</a>
	            <br/> <br/>
	            <strong>Help & Support</strong><br/>
	            WP Real Estate is our first Real Estate theme, and We would do anything to make it a great theme. Please Visit <a href="https://inkhive.com/product/wp-real-estate/" target="_blank">WP Real Estate</a> on InkHive & Contact us for any issues, bug reports or Feature Requests.','wp-real-estate'),
                'section' => 'wpre_sec_upgrade',
                'settings' => 'wpre_upgrade',
            )
        )
    );

    $wp_customize->add_section(
        'wpre_sec_pro',
        array(
            'title'     => __('Important Links','wp-real-estate'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'wpre_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Wpre_WP_Customize_Upgrade_Control(
            $wp_customize,
            'wpre_pro',
            array(
                'description'	=> '<a class="wpre-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'wp-real-estate').'</a>
                                    <a class="wpre-important-links" href="https://inkhive.com/documentation/wp-real-estate" target="_blank">'.__('WP Real Estate Documentation', 'wp-real-estate').'</a>
                                    <a class="wpre-important-links" href="https://demo.inkhive.com/wp-real-estate-pro/" target="_blank">'.__('WP Real Estate Plus Live Demo', 'wp-real-estate').'</a>
                                    <a class="wpre-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'wp-real-estate').'</a>
                                    <a class="wpre-important-links" href="https://wordpress.org/support/theme/wp-real-estate/reviews" target="_blank">'.__('Review WP Real Estate on WordPress', 'wp-real-estate').'</a>',
                'section' => 'wpre_sec_pro',
                'settings' => 'wpre_pro',
            )
        )
    );
}
add_action('customize_register', 'wpre_customize_register_misc_scripts');