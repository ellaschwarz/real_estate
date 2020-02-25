<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpre
 */
get_template_part('/modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wp-real-estate' ); ?></a>
	<?php get_template_part('modules/header/jumbosearch'); ?>
	
	<?php get_template_part('modules/header/masthead'); ?>
	
	<?php if (function_exists('property_detail')) : //Check if Plugin active
                if(is_front_page() || ( isset($_GET['search']))):
		            get_template_part( 'property', 'searchform' );
	        endif;
		endif; ?>

		
	<?php get_template_part('/modules/header/header', 'content'); ?>
	
	<?php get_template_part('/framework/featured-components/featured', 'pages'); ?>
		
	<?php get_template_part('/framework/featured-components/featured', 'estates'); ?>
			
	<?php get_template_part('/framework/featured-components/featured', 'listings'); ?>
	
	<div class="mega-container">
		
	
		<div id="content" class="site-content container">