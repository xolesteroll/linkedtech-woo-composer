<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

?>
<div class="site-content content-area" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'wrap row ' ); ?>>
		<div class="entry-content col-sm-8">
			<h1 class="page-title"><?php _e( 'Nothing Found', 'qobogt' ); ?></h1>
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Please check the URL and try again.', 'qobogt' ); ?></p>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div><!-- #content -->
