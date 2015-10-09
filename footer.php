<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Awesom0
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer page-footer light-blue accent-3" role="contentinfo">
		<!-- <div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'awesomo' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'awesomo' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'awesomo' ), 'Awesom0', '<a href="http://underscores.me/" rel="designer">Asim Malik</a>' ); ?>
		</div> --><!-- .site-info -->

		<div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            <span class="sep"> | </span>
            <a class="grey-text text-lighten-4" href="<?php echo esc_url( __( 'http://wordpress.org/', 'awesomo' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'awesomo' ), 'WordPress' ); ?></a>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'awesomo' ), 'Awesom0', '<a href="http://underscores.me/" rel="designer">Asim Malik</a>' ); ?>	
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
