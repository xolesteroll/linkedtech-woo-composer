<?php
/**
 * The Template for displaying all single posts
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

get_header();
?>

<div id="main-content" class="content-area">
	<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'post' );
	endwhile;
	?>
</div><!-- #main-content -->

<?php
get_footer();
