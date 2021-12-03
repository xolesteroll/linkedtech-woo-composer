<?php
/**
 * The template used for displaying news content
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

?>

<div class="site-content content-area" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'wrap row ' ); ?>>
		<div class="entry-content col-xs-12">
			<h1><?php the_title()?></h1>
			<?php $the_query = new WP_Query( array( 'posts_per_page' => -1, 'category_name' => 'news' ) ) ?>
			<?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>
				<div class="col-lg-3 col-sm-6 col-sx-12">
					<div class="news-item">
						<figure>
							<?php
							if ( has_post_thumbnail() ) :
								the_post_thumbnail( array( 260, 180 ) );
							endif;
							?>
						</figure>
						<div class="details">
							<h4 class='news-title'><a href="<?php the_permalink() ?>"> <?php the_title(); ?></a></h4>
							<div class="description">
								<p class="news-text">
									<?php echo implode( ' ', array_slice( explode( ' ', $post -> post_content ), 0, 50 ) ); ?>...
								</p>
								<p class="news-read-more">
									<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
										<span>Read more 
											<i class="fa fa-angle-double-right"></i>
										</span>
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>	<!-- #post-## -->
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div><!-- #content -->
