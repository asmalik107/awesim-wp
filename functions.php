<?php
/**
 * Awesim functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Awesim
 */

if ( ! function_exists( 'awesim_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function awesim_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Awesim, use a find and replace
	 * to change 'awesim' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'awesim', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('recent-thumbnail', 55, 55, true);
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('medium-thumbnail', 300, 200, true);
	add_image_size('large-thumbnail', 800, 600, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'awesim' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'awesim_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif; // awesim_setup
add_action( 'after_setup_theme', 'awesim_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function awesim_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'awesim_content_width', 640 );
}
add_action( 'after_setup_theme', 'awesim_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function awesim_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'awesim' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s article-single">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'awesim_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function awesim_scripts() {

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '', true );

	wp_enqueue_style( 'awesim-style', get_stylesheet_uri() );

	wp_enqueue_script( 'masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array('jquery'), '', true );

	wp_enqueue_script( 'awesim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'awesim-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'prism-js', get_template_directory_uri() . '/js/prism.js', array(), '', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'awesim_scripts' );



add_filter( 'wp_trim_excerpt', 'awesim_custom_excerpt', 10, 2 );

function awesim_custom_excerpt($text, $raw_excerpt) {

    if( ! $raw_excerpt ) {
        $content = apply_filters( 'the_content', strip_shortcodes(get_the_content() ));
        $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
        $text = preg_replace("/<img[^>]+\>/i", "", $text);
    }
    return $text;
}




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
