<?php if (has_header_image() & is_front_page()) : ?>

    <div class="container">
        <h1 class="title-font">Selected objects</h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
        <?php
            $args = [
                'post_type'	    => 'objects',
                'posts_per_page' => -1,
            ];
            $query = new WP_Query( $args );
            $firstIteration = 0;
            if( $query->have_posts() ):
               while( $query->have_posts() ) :
                   $query->the_post();
                   $selected = get_post_meta(get_the_ID(), 'selected', true); ?>
                         <?php if ($selected === "Yes") : ?>
                         <div class="carousel-item <?php if ($firstIteration == 0) : ?>active<?php $firstIteration++; endif; ?>">
                           <img class="d-block w-100" src="<?php echo the_post_thumbnail_url(); ?>" alt="Image of <?php echo the_title();?>">
                           <div class="carousel-caption d-none d-md-block selected-info">
                               <h2>
                                   <a href="<?php echo get_permalink(get_the_ID()); ?>">
                                       <?php echo the_title(); ?>
                                   </a>
                               </h2>
                                   <h4>Price: <?php echo get_post_meta(get_the_ID(), 'price', true); ?> kr</h4>
                                   <h4>Rooms: <?php echo get_post_meta(get_the_ID(), 'rooms', true); ?></h4>
                                   <h4>m²: <?php echo get_post_meta(get_the_ID(), 'm²', true); ?></h4>
                           </div>
                         </div>
                         <?php
                          endif;
                     endwhile;
                     wp_reset_query();
                  endif;?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>


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
