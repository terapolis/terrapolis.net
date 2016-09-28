<?php
/**
 * @package Teslar_Theme
 * Template Name: Contacts
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<style>
				.contacts{background:#fff;position:relative;padding:130px 0 0}.contacts__img-title{max-width:90px;display:block;margin:0 auto 105px}.contacts__wrapper{position:relative}.contacts__wrapper:before{content:'';position:absolute;bottom:0;left:0;width:100%;height:50%;background:#f5f5f5}.contacts__container{position:relative;width:80%;max-width:910px;text-align:left;margin:0 auto;background:#fff;-webkit-box-shadow:0 22px 84px rgba(0,0,0,0.12);box-shadow:0 22px 84px rgba(0,0,0,0.12)}.contacts__container::after{clear:both;content:"";display:table}@media (min-width: 754px){.contacts__container{width:90%}}.contacts__text-wrap{float:left;width:100%;padding:40px 30px;-webkit-box-sizing:border-box;box-sizing:border-box}@media (min-width: 508px){.contacts__text-wrap{padding:50px 45px}}@media (min-width: 754px){.contacts__text-wrap{padding:60px 55px 225px}}.contacts__info{font-size:16px}.contacts__info a[href^="mailto"]{color:#000}.contacts__map-wrap{float:left;width:100%;padding-bottom:100%;position:relative}@media (min-width: 754px){.contacts__map-wrap{position:absolute;top:0;right:0;bottom:0;width:50%;padding-bottom:0}}.contacts__map{position:absolute;top:0;left:0;width:100%;height:100%;border:none;background:#ccc}
			</style>

			<div class="contacts">

			    <div class="contacts__wrapper">
			        <div class="contacts__container">

			            <div class="contacts__text-wrap">
			                <div class="contacts__info">
			                    <a href="mailto:teslar@teslar.com.ua?subject=Hello">teslar@teslar.com.ua</a>
			                    <br>
			                    тел. +3800636926346
			                    <br>
			                    03113, Київ
			                    <br>
			                    вул. Василенко 2

								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/content', 'page' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
								?>

			                </div>
			            </div>

			            <div class="contacts__map-wrap">
			                <div id="map" class="contacts__map"></div>
			                <script src="https://maps.google.com/maps/api/js?key=AIzaSyAEdUg5SAOUVKPI6_l5vXcOj3GB_tKvrx4"></script>
			            </div>

			        </div>
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
