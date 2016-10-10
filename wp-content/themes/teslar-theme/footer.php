<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Teslar_Theme
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="footer" role="contentinfo">
        <div class="footer__powered">
            <?php printf( esc_html__( 'Powered by %2$s', '' ), '', '<a href="http://rooooster.com" rel="designer" target="_blank">Rooster Studio</a>' ); ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
