<?php
/**
 * anevy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package anevy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
require_once( get_template_directory().'/admin/bootstrap-nav-walker/class-wp-bootstrap-navwalker.php');


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function anevy_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on anevy, use a find and replace
		* to change 'anevy' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'anevy', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'anevy' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'anevy_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'anevy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anevy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'anevy_content_width', 640 );
}
add_action( 'after_setup_theme', 'anevy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function anevy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'anevy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'anevy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'anevy_widgets_init' );
/*-----------------------------------------------------------------------------------*/
/* Define Constants
/*-----------------------------------------------------------------------------------*/
define('SITE_URL', home_url());
define('THEME_PATH', get_template_directory().'/');
define('THEME_URI', get_template_directory_uri().'/');

define('THEME_CSS', THEME_URI.'assets/css/');
define('THEME_JS', THEME_URI.'assets/js/');
define('THEME_IMG', THEME_URI.'assets/images/');
define('THEME_FONTS', THEME_URI.'assets/fonts/');
define('DEFAULT_IMG', THEME_IMG.'default-placeholder.png');

define('themenamespace', wp_get_theme());
define('SITE_NAME', get_bloginfo('name'));
define('SITE_TAGLINE', get_bloginfo('description'));

/**
 * Enqueue scripts and styles.
 */
function anevy_scripts() {
	// wp_enqueue_style( 'mCustomScrollbar',THEME_CSS.'jquery.mCustomScrollbar.css');
	wp_enqueue_style( 'bootstrap',  THEME_CSS.'bootstrap.min.css');
	wp_enqueue_style( 'aos',  THEME_CSS.'aos.css');
	wp_enqueue_style( 'swipercss',  THEME_CSS.'swiper-bundle.min.css');
	wp_enqueue_style( 'slick',  THEME_CSS.'slick.css');
	wp_enqueue_style( 'style',  THEME_CSS.'style.css');
	wp_enqueue_style( 'responsive',  THEME_CSS.'responsive.css');

	// wp_enqueue_script('mCustomScrollbar',THEME_JS.'jquery.mCustomScrollbar.min.js');
	wp_enqueue_script('fontawesome',THEME_JS.'fontawesome.js',null, true );
	wp_enqueue_script('jquery',THEME_JS.'jquery.js',null, true );
	wp_enqueue_script('jquery-ui','https://code.jquery.com/ui/1.12.1/jquery-ui.js',null, true );
	wp_enqueue_script('bootstrap',THEME_JS.'bootstrap.min.js',null, true );
	wp_enqueue_script('scrollIt',THEME_JS.'scrollIt.min.js',null, true );
	wp_enqueue_script('slick',THEME_JS.'slick.min.js',null, true );
	wp_enqueue_script('cookie','https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js',null, true );
	wp_enqueue_script('matchHeight','https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js',null, true );
	wp_enqueue_script('aos',THEME_JS.'aos.js',null, true );
	wp_enqueue_script('swiperjs',THEME_JS.'swiper-bundle.min.js',null, true );

	wp_enqueue_script('custom',THEME_JS.'custom.js',null, true );

}
add_action( 'wp_enqueue_scripts', 'anevy_scripts' );

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

function override_mce_options($initArray) 
{
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
 }
 add_filter('tiny_mce_before_init', 'override_mce_options');

 function currentYear( $atts ){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );

function enable_shortcodes_in_acf_text_field() {
    add_filter('acf/format_value/type=text', 'do_shortcode');
}
add_action('acf/init', 'enable_shortcodes_in_acf_text_field');

// add_filter( 'nav_menu_link_attributes', 'cfw_add_data_atts_to_nav', 10, 4 );
// Hook the function into the 'nav_menu_link_attributes' filter
add_filter('nav_menu_link_attributes', 'cfw_add_data_atts_to_nav', 20, 3);

// Define the function
function cfw_add_data_atts_to_nav($atts, $item, $args)
{
    $atts['data-scroll-nav'] = $item->scroll_id;
    return $atts;
}

    // Allow SVG
    function allow_svg($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'allow_svg');

    function fix_mime_type_svg($data = null, $file = null, $filename = null, $mimes = null)
    {
        $ext = isset($data['ext']) ? $data['ext'] : '';
        if (strlen($ext) < 1) {
            $exploded = explode('.', $filename);
            $ext = strtolower(end($exploded));
        }
        if ($ext === 'svg') {
            $data['type'] = 'image/svg+xml';
            $data['ext'] = 'svg';
        } elseif ($ext === 'svgz') {
            $data['type'] = 'image/svg+xml';
            $data['ext'] = 'svgz';
        }
        return $data;
    }
    add_filter('wp_check_filetype_and_ext', 'fix_mime_type_svg', 75, 4);

    function fix_svg()
    {
        echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
            </style>';
    }
    add_action('admin_head', 'fix_svg');