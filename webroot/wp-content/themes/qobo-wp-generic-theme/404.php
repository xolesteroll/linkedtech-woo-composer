<?php
/**
 * The template used for displaying 404 page
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'qobo' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'qobo' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</div>
</div>
<?php get_footer(); ?>
