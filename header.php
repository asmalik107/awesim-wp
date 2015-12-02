<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Awesomo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'awesomo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
	<!-- 			<p class="site-description"><?php bloginfo( 'description' ); ?></p> -->
		</div><!-- .site-branding -->


		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="menu-container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
            <div class="menu-toggle">
                <button class="button-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'awesomo' ); ?></button>
            </div>
			<div class="header-social-icons">
				<ul>
					<li>
						<a href="https://www.facebook.com/">
							<span class="fa-stack fa-stack-header">
								<i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
								<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/">
							<span class="fa-stack fa-stack-header">
								<i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
								<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/">
							<span class="fa-stack fa-stack-header">
								<i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
								<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
				</ul>
			</div>
			<?php get_search_form(); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div class="mobile-menu">
	    <div class='mobile-menu-container'>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_id' => 'primary-menu' ) ); ?>
        </div>
        <div class="header-social-icons">
            <ul>
                <li>
                    <a href="https://www.facebook.com/">
                        <span class="fa-stack fa-stack-header">
                            <i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/">
                        <span class="fa-stack fa-stack-header">
                            <i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/">
                        <span class="fa-stack fa-stack-header">
                            <i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
                            <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

<!-- 	<div id="content" class="site-content"> -->


