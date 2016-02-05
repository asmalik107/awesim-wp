<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Awesim
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<!--	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'awesim' ); ?></a> -->

	<header id="masthead" class="site-header" role="banner">
        <div class="menu-toggle">
            <div id="nav-icon">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>


        </div>
		<a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		    <span class='site-logo'>AM</span>
		</a>


		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="menu-container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>

		    <div class="search-container">
                <a class="search-click"><i class="fa fa-2x fa-search"></i></a>
                <div class="search-bar">
			        <?php get_search_form(); ?>
			        <a class="search-click close-search"><i class="fa fa-close"></i></a>
                </div> <!-- .search-bar -->
			</div> <!-- .search-container -->

            <?php awesim_social_icons() ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div class="mobile-menu">
	    <div class='mobile-menu-container'>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_id' => 'primary-menu' ) ); ?>
        </div>
        <?php awesim_social_icons() ?>
    </div>

 	<div id="content" class="site-content"> <!--#content -->


