<?php if (has_header_image() & is_front_page()) : ?>
    <div id="header-image" class="container">
<?php
    $args = [
        'post_type'	    => 'objects',
        //'meta_key'		=> 'selected',
        //'meta_value'	=> 'true',
    ];

    $query = new WP_Query( $args );
    echo "HEJ";
    if( $query->have_posts() ):
       while( $query->have_posts() ) : $query->the_post(); ?>
          <p><?php echo the_title(); ?></p>
       <?php endwhile; ?>
    <?php endif; ?>

    <?php wp_reset_query();	 // Restore global post data stomped by the_post().

 ?>
        <?php if (get_theme_mod('wpre_hinfo_enable') && (get_theme_mod('wpre_header_content_page') != '' )) :
            $pageid = get_theme_mod('wpre_header_content_page'); ?>
            <div class="header-information">
                <div class="header-info-inner">
                    <div class="line1 title-font"><?php echo get_the_title($pageid); ?></div>
                    <div class="line2"><?php $i = get_post($pageid); echo nl2br($i->post_content); ?></div>
                    <a href="<?php echo (get_theme_mod('wpre_header_url')) ? esc_url(get_theme_mod('wpre_header_url')) : esc_url(get_the_permalink($pageid)) ?>" class="learnmore title-font"><?php echo esc_html(get_theme_mod('wpre_header_btn',__('Learn More','wp-real-estate'))); ?></a>
                </div>
            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>
