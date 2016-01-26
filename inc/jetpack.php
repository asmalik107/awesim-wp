<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Awesim
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function awesim_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'awesim_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function awesim_jetpack_setup
add_action( 'after_setup_theme', 'awesim_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function awesim_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function awesim_infinite_scroll_render
