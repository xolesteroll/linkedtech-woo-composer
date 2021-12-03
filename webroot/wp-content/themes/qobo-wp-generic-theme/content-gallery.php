<?php
/**
 * Content template used for displaying the gallery content
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

/**
 * Create gallery section
 *
 * @param string $section_title Section title.
 * @param array  $args Arguments to be passed  to WP_Query.
 */
function createGallerySection( $section_title, $args ) {
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) { ?>
		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="col-md-3 col-sm-4 col-xs-6 <?php echo $section_title?> padding-sm-bottom"> 
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="/<?php echo $the_query->post->post_name ?>">
						<figure>
							<?php the_post_thumbnail(); ?>
						</figure>
					</a>
				<?php endif; ?>
				<div class="<?php echo $section_title; ?>-title">
					<a href="/<?php echo $the_query->post->post_name ?>">
						<?php the_title() ?>
					</a>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- end of the loop -->
		<?php wp_reset_postdata(); ?>
	<?php } else { ?>
		<p><?php _e( 'Sorry, no masterpieces available in this section.' ); ?></p>
	<?php }
}
?>

<div class="site-content content-area" role="main">	
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'wrap row' ); ?>>
		<div class="site-gallery">
			<div class="col-xs-12"> 
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
				<div class="row">
					<?php
					$args = array( 'posts_per_page' => -1, 'category__and' => array( get_category_by_slug( 'gallery' ) -> term_id ) );
					createGallerySection( 'gallery', $args );
					?>
				</div>
			</div>
		</div>	<!-- .site-gallery -->
	</article><!-- #post-## -->
</div><!-- #content -->
			
