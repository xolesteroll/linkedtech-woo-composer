<?php
/**
 * PHP5
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

get_header(); ?>

<div id="main-content" class="main-content">
		<?php if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content' );
			endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif; ?>
</div><!-- #main-content -->

<?php
get_footer();
