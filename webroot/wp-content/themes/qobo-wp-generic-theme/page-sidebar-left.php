<?php
/**
 * Template Name: Left Sidebar 1
 * The template for displaying a sidebar right of the content.
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

get_header();
?>

<div id="main-content" class="content-area">
	<?php
	// Start the Loop.
	while ( have_posts() ) :
		the_post();
		// Include the page content template.
		get_template_part( 'content','sidebar-left' );
	endwhile;
	?>
</div> <!-- #main-content -->

<?php
get_footer();
