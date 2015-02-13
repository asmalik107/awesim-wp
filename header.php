<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Awesom0
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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'awesomo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<!-- <div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div> --><!-- .site-branding -->

		<!-- <nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'awesomo' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav> --><!-- #site-navigation -->

		<nav>
			<div class="nav-wrapper light-blue accent-3">
				<a href="#" class="brand-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

				<?php wp_nav_menu( array( 
					'menu'              => 'primary',
					'theme_location' 	=> 'primary', 
					'container'         => '',
					'menu_class' 		=> 'right hide-on-med-and-down',
					'depth'             => 1
					) 
				); ?>

				<?php wp_nav_menu( array( 
					'menu'              => 'primary',
					'theme_location' 	=> 'primary', 
					'container'         => '',
					'menu_id'			=> 'mobile-demo',
					'menu_class' 		=> 'side-nav',
					'depth'             => 1
					) 
				); ?>
		
			</div>
		</nav>	

	</header><!-- #masthead -->

	<div id="content" class="site-content">
