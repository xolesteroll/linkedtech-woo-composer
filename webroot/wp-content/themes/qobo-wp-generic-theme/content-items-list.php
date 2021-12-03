<?php
/**
 * Content template used for displaying the Items list content
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

?>

<div class="site-content content-area" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'wrap row' ); ?>>

		<div class="site-list">
			<div class="col-xs-12">
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			</div>
			<div class="col-xs-12 row padding-zero-leftright">
			<?php
				$args = array( 'posts_per_page' => -1, 'cat' => get_category_by_slug( 'list' ) -> term_id );
			if ( $args != null ) {
				$the_query = new WP_Query( $args ); ?>
	
					<?php if ( $the_query->have_posts() ) : ?>
					
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="col-sm-12 list-item padding-md-bottom display-table">
							<div class="col-md-3 col-xs-6 list-item-image center-vertical">
								<a href="/<?php echo $the_query->post->post_name ?>">
									<figure>
										<?php
										if ( has_post_thumbnail() ) :
											the_post_thumbnail();
										endif;
										?>
									</figure>
								</a>
							</div>
							<div class="col-md-9 col-xs-6 list-item-details center-vertical ">
								<div class="col-sm-12 list-item-title">
									<a href="/<?php echo $the_query->post->post_name ?>">
										<?php the_title() ?>
									</a>
								</div>
								<?php if ( get_the_content() ) { ?>
									<div class="col-sm-12 list-item-content">
										<?php echo implode( ' ', array_slice( explode( ' ', get_the_content() ), 0, 50 ) ); ?>...
									</div>
								<?php } ?>
								<div class="col-sm-12 list-item-more alignright">
									<a href="/<?php echo $the_query->post->post_name ?>">
										View More
									</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<!-- end of the loop -->
				
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no masterpieces available in this section.' ); ?></p>
				<?php endif; ?>
				</div>
				<?php } ?>
		</div>	<!-- .entry-content -->
	</article><!-- #post-## -->
</div><!-- #content -->
