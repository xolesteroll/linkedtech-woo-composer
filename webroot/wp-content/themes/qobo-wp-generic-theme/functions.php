<?php


/**
 * Qobo Generic Wordpress Theme functions and definitions
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

/**
 * Flush rewrite rules for custom post types
 */
function bt_flush_rewrite_rules() {
	flush_rewrite_rules();
}
/*  Flush rewrite rules when switching themes*/
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );

// Register Menus.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'Qobo BGT' ),
	'footer' => __( 'Footer Menu', 'Qobo BGT' ),
) );

// Add thumbnails support to posts.
add_theme_support( 'post-thumbnails' );

// Load custom nav walker.
require get_template_directory() . '/inc/navwalker.php';

/**
 * Register widget sidebars
 *
 * @return void
 */
function qobobgt_widgets_init() {
	register_sidebar( array(
			'id' => 'sidebar-right',
			'name' => __( 'Sidbar Right', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="widget %1$s %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
	) );

	register_sidebar( array(
			'id' => 'sidebar-left',
			'name' => __( 'Sidebar Left', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
	) );

	register_sidebar( array(
			'id' => 'footer-widget-1',
			'name' => __( 'Footer Widget Left', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="footer-widget-title">',
			'after_title' => '</h3>',
	) );
	register_sidebar( array(
			'id' => 'footer-widget-2',
			'name' => __( 'Footer Widget Left Middle', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="footer-widget-title">',
			'after_title' => '</h3>',
	) );
	register_sidebar( array(
			'id' => 'footer-widget-3',
			'name' => __( 'Footer Widget Middle Right', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="footer-widget-title">',
			'after_title' => '</h3>',
	) );
	register_sidebar( array(
			'id' => 'footer-widget-4',
			'name' => __( 'Footer Widget Right', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="footer-widget-title">',
			'after_title' => '</h3>',
	) );
	register_sidebar( array(
			'id' => 'under-footer-widget-1',
			'name' => __( 'Widget Under Footer Left', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="under-footer-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="footer-widget-title">',
			'after_title' => '</h3>',
	) );
	register_sidebar( array(
			'id' => 'under-footer-widget-2',
			'name' => __( 'Widget Under Footer Right', 'qobobgt' ),
			'before_widget' => '<aside id="%1$s" class="under-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="footer-widget-title">',
			'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'qobobgt_widgets_init' );

/**
 * Include custom CSS from a given file
 *
 * @param string $file Path to CSS file.
 * @return string HTML <link> tag with URL of the custom CSS.
 */
function includeCustomCSS( $file = '/custom.css' ) {
	$result = '';

	// ABSPATH points to WordPress folder, which in our
	// case is in wp/ .  So we need one level up.
	$root = ABSPATH . '..';
	if ( ! empty( $file ) && file_exists( $root . $file ) ) {
		$result = '<link rel="stylesheet" href="' . home_url( $file ) . '">';
	}

	return $result;
}




/**
 * Include custom JavaScript from a given file
 *
 * @param string $file Path to JS file.
 * @return string HTML <script> tag with URL of the custom JS.
 */
function includeCustomJS( $file = '/custom.js' ) {
	$result = '';
	console_log('dasddasdas');
	
	// ABSPATH points to WordPress folder, which in our
	// case is in wp/ .  So we need one level up.
	$root = ABSPATH . '..';

	if ( ! empty( $file ) && file_exists( $root . $file ) ) {
		$result = '<script type="text/javascript" src="' . home_url( $file ) . '"></script>';
	}
	return $result;
}

/**
 * Format price
 *
 * @param mixed $price Price to format.
 * @return mixed Formatted price.
 */
function formatPrice( $price ) {
	$price = trim( $price );
	if ( is_numeric( $price ) ) {
		return '$' . number_format( (int) $price );
	} else {
		return $price ;
	}
}

/**
 * Filter images from HTML string
 *
 * @param string $string HTML string to filter images from.
 * @return string|array Array of matches, or original string.
 */
function filterImagesFromString( $string ) {
	preg_match_all( '/<img[^>]+>/', $string,$results,PREG_PATTERN_ORDER );
	$matches = $results[0];
	if ( empty( $matches ) ) {
		return $string;
	} else {
		return $matches;
	}
}

/**
 * Get contact information
 *
 * @todo Fix to either print or return result, not both.
 * @return string Error.
 */
function getContactInformation() {
	$info_file = '/contact-info.txt';
	$result = '';
	// ABSPATH points to WordPress folder, which in our
	// case is in wp/ .  So we need one level up.
	$root = ABSPATH . '..';
	if ( ! empty( $info_file ) && file_exists( $root . $info_file ) ) {
		$myfile = fopen( $root . $info_file, 'r' ) or die( 'Unable to open file!' );
		while ( ! feof( $myfile ) ) {
			echo fgets( $myfile ) . '<br />';
		}
		fclose( $myfile );
	} else {
		$result = 'Contact information coming soon';
	}
	return $result;
}
