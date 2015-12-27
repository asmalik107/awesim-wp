<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Awesomo
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
    <?php awesemo_recent_posts(); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
