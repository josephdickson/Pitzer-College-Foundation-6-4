<?php
/**
 * Pitzer College functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pitzer_College
 */

if ( ! function_exists( 'pitzer_college_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pitzer_college_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Pitzer College, use a find and replace
		 * to change 'pitzer-college' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pitzer-college', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pitzer-college' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pitzer_college_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pitzer_college_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pitzer_college_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pitzer_college_content_width', 640 );
}
add_action( 'after_setup_theme', 'pitzer_college_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pitzer_college_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pitzer-college' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pitzer-college' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pitzer_college_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pitzer_college_scripts() {
	wp_enqueue_style( 'pitzer-college-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pitzer-college-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pitzer-college-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pitzer_college_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Pitzer College Theme includes */
/**
 * Custom Walker to extend functionality
 */
require get_template_directory() . '/inc/custom_nav.php';

/**
 * Enqueue scripts and styles.
 */
function foundation_6_parent_scripts() { 

	wp_enqueue_style( 'foundation-style',  get_template_directory_uri() . '/css/foundation.min.css' );
    
	wp_enqueue_style( 'foundation-6-parent-style', get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'google-web-font-eb-garamond', 'https://fonts.googleapis.com/css?family=EB+Garamond' );

	wp_enqueue_style( 'foundation-app-style', get_template_directory_uri() . '/css/app.css' );
    
	wp_enqueue_script( 'foundation-6-parent-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'foundation-6-parent-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'foundation-jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '20151221', false );

	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/js/foundation.js', array(), '20151221', true );

	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array(), '20151221', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'foundation_6_parent_scripts' );

/**
 * A fallback when no navigation is selected by default, otherwise it throws some nasty errors in your face.
 */

function foundation_menu_fallback() {
	echo '<div class="alert-box navigation">';
	// Translators 1: Link to Menus, 2: Link to Customize
  	printf( __( 'Please assign a menu to %1$s or %2$s the design.', 'foundation' ),
  		sprintf(  __( '<a href="%s">Menus</a>', 'foundation' ),
  			get_admin_url( get_current_blog_id(), 'nav-menus.php' )
  		),
  		sprintf(  __( '<a href="%s">Customize</a>', 'foundation' ),
  			get_admin_url( get_current_blog_id(), 'customize.php' )
  		)
  	);
  	echo '</div>';
}


/* Foundation Shortcodes */
require get_template_directory() . '/inc/foundation-shortcodes/foundation-shortcodes.php';

/**
 * Disable the emoji's
 * https://wordpress.org/plugins/disable-emojis/
 * See Plugin for GPL License and readme.txt version 1.5.1
 */

require get_template_directory() . '/inc/disable-emojis.php';

/**
 * The following Requires the Advanced Custom Fields plugin to display
 * Visit http://advancedcustomfields.com/ for more information
 */

/* Social Networks */
require get_template_directory() . '/inc/social-networks.php';

/* Options Page - Requires Advanced Custom Fields */
require get_template_directory() . '/inc/options-page.php';

/* Flexible Content - Requires Advanced Custom Fields */
require get_template_directory() . '/inc/flexible-content.php';

/* Google Search - Requires WP Google Search https://wordpress.org/plugins/wp-google-search/ */
require get_template_directory() . '/inc/google-search.php';


/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
