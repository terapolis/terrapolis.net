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
        <nav class="footer__socnav">
            <a href="#">facebook</a>
            <a href="#">pinterest</a>
            <a href="#">instagram</a>
        </nav>
        <div class="footer__copyright">2013 - 2016 © Tesl'ar</div>
        <div class="footer__powered">
            <?php printf( esc_html__( 'Powered by %2$s', '' ), '', '<a href="http://rooooster.com" rel="designer" target="_blank">Rooster Studio</a>' ); ?>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
