<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Awesom0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col s4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->



</div> <!-- .row -->