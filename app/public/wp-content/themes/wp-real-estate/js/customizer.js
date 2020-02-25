/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

    //Site Identity

    // Header text color.
    wp.customize( 'wpre_hide_title_tagline', function ( value ) {
        value.bind( function ( to ) {
            $( '#text-title-desc' ).toggle();
        });
    } );

    //Design & Layouts
    //Colors
    wp.customize( 'wpre_site_titlecolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).css( 'color', to );
        } );
    } );

    wp.customize( 'wpre_header_desccolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );

    wp.customize( 'background_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );
    
    //Social Icons
    wp.customize( 'wpre_social_1', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(0)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'wpre_social_2', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(1)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'wpre_social_3', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(2)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'wpre_social_4', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(3)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'wpre_social_5', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(4)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'wpre_social_6', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(5)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'wpre_social_7', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(6)' ).attr( 'class', ClassNew );
        });
    });

    //Header Text
	wp.customize('wpre_header_btn', function( value ) {
		value.bind( function ( to ) {
			$('.learnmore').text(to);
		});
	});
    wp.customize('wpre_hinfo_enable', function( value ) {
        value.bind( function ( to ) {
            $('.header-information').toggle();
        });
    });


    //Featured Area
    wp.customize('wpre_fpages_enable', function( value ) {
        value.bind( function ( to ) {
            $('.featured-pages-section').toggle();
        });
    });
	wp.customize('wpre_fe_enable', function( value ) {
		value.bind( function ( to ) {
			$('#featured-estates').toggle();
		});
	});
	wp.customize('wpre_fe_title', function( value ) {
		value.bind( function ( to ) {
			$('#featured-estates .section-title').text(to);
		});
	});

    wp.customize('wpre_fn_enable', function( value ) {
        value.bind( function ( to ) {
            $('#featured-news').toggle();
        });
    });
	wp.customize('wpre_fn_title', function( value ) {
		value.bind( function ( to ) {
			$('#featured-news .section-title').text(to);
		});
	});

	//Footer
    wp.customize('wpre_footer_text', function( value ) {
        value.bind( function ( to ) {
            $('.sep').text(to);
        });
    });

} )( jQuery );
