<?php
/**
 * Theme functions
 *
 * This file provides the place for all the necessary functions of the
 * theme.
 *
 * Instead of growing one huge file, which is hard to maintain and
 * reuse, this file is broken down into bits and pieces, which are
 * loaded automatically.  This way, classes, shortcodes, widgets and
 * other snippets can be easily copied from theme to them.
 *
 * @package Custom
 */


// Define theme's images URI.
if ( ! defined( 'IMAGES_URI' ) ) {
	define( 'IMAGES_URI', get_stylesheet_directory_uri() . '/images/' );
}

// Define theme's functions directory.
if ( ! defined( 'THEME_LIB_DIR' ) ) {
	define( 'THEME_LIB_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR );
}

/**
 * Load all functions which are placed in theme's folder
 *
 * @param string $dir Directory to load files from.
 * @return void
 */
function load_includes( string $dir ) : void {
	$it = new RecursiveDirectoryIterator( $dir );
	$it = new RecursiveIteratorIterator( $it );
	$it = new RegexIterator( $it, '#.php$#' );
	foreach ( $it as $include ) {
		if ( $include->isReadable() ) {
			require_once( $include->getPathname() );
		}
	}
}


load_includes( THEME_LIB_DIR );

add_action( 'wp_enqueue_scripts', 'my_scripts' );

function my_scripts() {
//   wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/includes/jquery/jquery.min.js', array(), '1.0', true );
wp_enqueue_script("jquery");
  wp_enqueue_script( 'slick-slider', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.0', true );
  wp_enqueue_script( 'custom.js', get_stylesheet_directory_uri() . '/includes/js/custom.js', array(), '1.0', true );
}


function banners_posttype() {
 
    register_post_type( 'banners',
        array(
            'labels' => array(
                'name' => __( 'Banners' ),
                'singular_name' => __( 'banner' )
            ),
            'public' => true,
            'has_archive' => __return_false(),
            'rewrite' => array('slug' => 'banners'),
            'show_in_rest' => true,
        )
    );
}

add_action( 'init', 'banners_posttype' );


