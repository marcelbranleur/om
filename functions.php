<?php
/**
 * Omforma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Omforma
 */

if ( ! function_exists( 'omforma_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function omforma_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Omforma, use a find and replace
		 * to change 'omforma' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'omforma', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'omforma' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'omforma'),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'omforma_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function omforma_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'omforma' ),
		'id'            => 'sidebar-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'omforma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'omforma' ),
		'id'            => 'sidebar-footer',
		'before_widget' => '<div class="">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="text-left">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'					=> esc_html__( 'Sidebar widgets', 'omforma' ),
		'id'						=> 'sidebar-widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'omforma_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function omforma_scripts() {

	// Load styles in the header
	wp_enqueue_style( 'omforma-style-main', get_stylesheet_uri() );
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;subset=latin-ext', array(), null, false);
  wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null, false);
	wp_enqueue_style( 'omforma-style', get_template_directory_uri() . '/src/css/style.css', array(), null, false );

	// Load scripts in the footer
	wp_register_script('jquery-3.2.1', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), '3.2.1', true);
	wp_enqueue_script('jquery-3.2.1');

  wp_register_script( 'popper-1.12.3', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array(), '1.12.3', true);
	wp_enqueue_script('popper-1.12.3');

  wp_register_script( 'bootstrap-4.0.0-beta.2', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array(), '4.0.0-beta.2', true);
	wp_enqueue_script('bootstrap-4.0.0-beta.2');

	wp_register_script( 'omforma-script', get_template_directory_uri() . '/src/js/script.js', array(), null, true );
	wp_enqueue_script('omforma-script');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'omforma_scripts' );

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

/*
* Add Calendar post type
*/
add_action( 'init', 'create_calendar_post_type' );
function create_calendar_post_type() {
  register_post_type( 'calendar',
    array(
      'labels' => array(
        'name' => __( 'Calendar' ),
        'singular_name' => __( 'calendar' )
      ),
			'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
      'public' => true,
      'has_archive' => true,
    )
  );
}

/*
* Filter to change the li classes on the primary menu
*/
function filter_handler( $classes, $item, $args, $depth ) { 
	if('menu-1' == $args->theme_location) {
		$classes[] = 'nav-item';
	}
	if(in_array('current-menu-item', $classes)) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'filter_handler', 10, 4 ); 

/*
* Function to add class to a in all menues
*/
function add_menuclass($ulclass, $args) {
	$menu = $args->menu->slug;
	if($menu == 'footer-menu') {
		return preg_replace('/<a /', '<a class="footer-nav-link"', $ulclass);
	}
	return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass', 10, 2);

/* 
* Function to add a custom Menu Walker to the Footer menu 
* Item_wrap needs to be set to be able to change the ul class
*/
function omforma_custom_walker( $args ) {
	$menu = $args['menu'];
	if($menu->slug == 'footer-menu') {
		$args['walker'] = new Omforma_Walker();
		$args['items_wrap'] = '<ul class="mr-auto footer-nav-list">%3$s</ul>';
	}
	return $args;    
}
add_filter( 'wp_nav_menu_args', 'omforma_custom_walker' );

/* 
* Custom Menu Walker to change the ul and a classes of a menu 
*/
class Omforma_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$classes = array();
		if(!empty($item->classes)) {
			$classes = (array) $item->classes;
		}

    $active_class = '';
    if( in_array('current-menu-item', $classes) ) {
    	$active_class = ' active';
    }
    $url = '';
    if( !empty( $item->url ) ) {
    	$url = $item->url;
    }
    $output .= '<li class="footer-nav-item' . $active_class . '"><a class="footer-nav-link" href="' . $url . '">' . $item->title . '</a></li>';
	}
  public function end_el( &$output, $item, $depth = 0, $args = array() ) {
  	$output .= '</li>';
  }
}

/* 
* Function to allow custome excertps lengths. Used in template files to output the excerpts
*/
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}

/*
* Function ot add image sizes 
*/
add_image_size( 'slider', 350, 240, true );

/*
* Function to remove "Category:" and "Archive:" from category/archive pages 
*/
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

/* change parent in sidebar */
add_filter('advanced_sidebar_menu_widget_title', 'omforma_parent_as_title',99, 4 );
function omforma_parent_as_title( $title, $args, $instance, $object){
    return sprintf('%s', get_the_title($object->top_id) );
}


