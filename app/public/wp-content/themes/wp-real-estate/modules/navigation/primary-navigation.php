<nav id="site-navigation" class="main-navigation col-md-8 col-sm-12 title-font" role="navigation">
    <?php $walker = new Wpre_menu_with_Icon;
    if (!has_nav_menu('primary')) :
        $walker = '';
    endif;
    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>

    <div class="social-icons">
        <?php get_template_part('modules/social/social', 'fa'); ?>
    </div>
</nav><!-- #site-navigation -->