<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Awesomo
 */

?>


<!--</div> #content -->
    <div class="clear-push"></div>
	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="copyright">
	        <span>© Asim Malik</span>
	        <span>
	        	<?php printf( esc_html__( 'Theme: %1$s designed and developed by Asim Malik. Powered by %2$s.', 'awesomo' ), '<a href="https://github.com/asmalik107/awesome-wp">Awesomo</a>', 'WordPress' ); ?>
	        </span>
	    <!--<?php awesemo_social_icons() ?> -->
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>