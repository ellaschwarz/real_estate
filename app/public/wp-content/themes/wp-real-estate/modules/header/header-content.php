<?php if (has_header_image() & is_front_page()) : ?>
    <div id="header-image" class="container">
        <img src="<?php header_image(); ?>" width="100%">

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