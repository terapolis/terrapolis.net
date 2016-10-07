<?php
/**
 * @package Teslar_Theme
 * Template Name: Contacts
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="contacts-page">

                <div id="map" class="contacts__map"></div>
                <script src="https://maps.google.com/maps/api/js?key=AIzaSyAEdUg5SAOUVKPI6_l5vXcOj3GB_tKvrx4"></script>

                <div class="contacts-page__info">

                    <img class="contacts-page__logo" src="/wp-content/themes/teslar-theme/img/logo/logo.svg" alt="Teslar Logo" title="Teslar Logo">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content-contacts', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>

                </div>

            </div>

            <script>
                /**
                * google map
                * 
                */
                function initMap() {
                    var myLatLng = {lat: 35.1711942, lng: 33.3812295},
                        draggable = isMobile.any() ? false : true;

                    var styles = {
                        'Codereamer Style': [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
                    };

                    for (var s in styles) {
                        var opt = {
                            mapTypeControlOptions: {
                                mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, s]
                            },
                            disableDefaultUI: false,
                            navigationControl: true,
                            draggable: draggable,
                            scrollwheel: false,
                            center: myLatLng,
                            zoom: 16,
                            mapTypeId: s
                        };

                        var div = document.getElementById('map');
                        var map = new google.maps.Map(div, opt);
                        var styledMapType = new google.maps.StyledMapType(styles[s], {name: s});
                        map.mapTypes.set(s, styledMapType);
                    }

                    var marker = new google.maps.Marker({
                        map: map,
                        position: myLatLng,
                        title: 'Hello World!'
                    });
                }

                //////////////////////////////////////////////////////////////////////////////////////////////////////
                // GLOBAL VARIABLES
                //////////////////////////////////////////////////////////////////////////////////////////////////////
                var isMobile = {
                    Android: function() {
                        return navigator.userAgent.match(/Android/i);
                    },
                    BlackBerry: function() {
                        return navigator.userAgent.match(/BlackBerry/i);
                    },
                    iOS: function() {
                        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                    },
                    Opera: function() {
                        return navigator.userAgent.match(/Opera Mini/i);
                    },
                    Windows: function() {
                        return navigator.userAgent.match(/IEMobile/i);
                    },
                    any: function() {
                        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                    }
                };
            </script>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
