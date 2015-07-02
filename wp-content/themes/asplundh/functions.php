<?php
/**
 * asplundh functions and definitions
 *
 * @package asplundh
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

//PG - 1623
 require_once( get_template_directory() . '/includes/php/config_path.php');
if ( ! function_exists( 'asplundh_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    

function asplundh_setup() {

     
    
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on asplundh, use a find and replace
	 * to change 'asplundh' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'asplundh', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'asplundh' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'asplundh_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
        
        //PG-1623
        add_theme_support( 'post-thumbnails' );
        add_image_size('banner-image-samll', 229, 229, true);
        add_image_size('banner-image-large', 1000, 313, true);
        
        if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails', array('post', 'page', 'asp-about')); // enable feature
    set_post_thumbnail_size( 229, 229 ); // default size
add_image_size('banner-image-small', 229, 229, true);
        add_image_size('banner-image-large', 1000, 310, true);
        add_image_size('latest-news', 350, 291, true);
}
}
endif; // asplundh_setup
add_action( 'after_setup_theme', 'asplundh_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function asplundh_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer', 'asplundh' ),
		'id'            => 'asplundh-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title-display-none">',
		'after_title'   => '</h1>',
	) );
        register_sidebar( array(
		'name'          => __( 'Subsidiary Logo', 'asplundh' ),
		'id'            => 'asplundh-subsidiary-logo',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title-display-none">',
		'after_title'   => '</h1>',
	) );
         register_sidebar( array(
		'name'          => __( 'Contact Info', 'asplundh' ),
		'id'            => 'asplundh-contact-info',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
          register_sidebar( array(
		'name'          => __( 'Employment', 'asplundh' ),
		'id'            => 'asplundh-employment',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
           register_sidebar( array(
		'name'          => __( 'Contact By State - Left Description', 'asplundh' ),
		'id'            => 'asplundh-contact-by-state',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
              register_sidebar( array(
		'name'          => __( 'Services', 'asplundh' ),
		'id'            => 'asplundh-services',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title-display-none">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'asplundh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function asplundh_scripts() {
	
}
add_action( 'wp_enqueue_scripts', 'asplundh_scripts' );

//PG - 1623
function register_my_menu() {
  register_nav_menu('header-navigation',__( 'Header Navigation' ));
}
add_action( 'init', 'register_my_menu' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'selected';
     }
     return $classes;
}