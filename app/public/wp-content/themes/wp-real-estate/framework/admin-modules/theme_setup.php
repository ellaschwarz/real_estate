<?php
/**
 * wpre functions and definitions
 *
 * @package wpre
 */



if ( ! function_exists( 'wpre_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wpre_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on wpre, use a find and replace
         * to change 'wp-real-estate' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'wp-real-estate', get_template_directory() . '/languages' );

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 640; /* pixels */
        }

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         *
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'wp-real-estate' )
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'gallery', 'caption',
        ) );


        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'wpre_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );

        add_image_size('wpre-sq-thumb', 600,600, true );
        add_image_size('wpre-thumb', 540,450, true );
        add_image_size('wpre-pop-thumb',542, 340, true );

        //Declare woocommerce support
        add_theme_support('woocommerce');

        //Declare support for Propert Listings Plugin
        add_theme_support('wp-property-listings');

    }
endif; // wpre_setup
add_action( 'after_setup_theme', 'wpre_setup' );