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
<aside id="recent-posts-2" class="widget widget_recent_entries article-single">
    <h3>Recent Posts</h3>
    <ul>
        <?php
            $args = array( 'numberposts' => '5' );
	        $recent_posts = wp_get_recent_posts($args);
	        foreach( $recent_posts as $recent ){
		        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	        }
        ?>
    </ul>
		</aside>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
