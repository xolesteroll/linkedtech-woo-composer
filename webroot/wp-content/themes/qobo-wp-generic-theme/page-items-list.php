<?php
/**
 * Template Name: Items List
 * The template for displaying the items list
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
		get_template_part( 'content', 'items-list' );
	endwhile;
	?>
</div><!-- #main-content -->

<?php
get_footer();
