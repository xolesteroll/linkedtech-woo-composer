<?php
/**
 * Content template used for displaying the contact us content
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

$url = get_permalink();
$image = null;
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
?>

<div class="site-content content-area" role="main"
<?php
if ( ! empty( $image ) && is_array( $image ) ) {
	echo 'style="background: url(' . $image[0] . ') no-repeat; background-size:cover"';
}
?> >
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'wrap row' ); ?>>
		<div class="site-contact-us">
			<div class="col-sm-12">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			</div>
			<div class="col-sm-12 contact-form-container">
				<div class="contact-content row padding-zero-leftright">
					<div class="contact-form  col-md-8">
						<form action="<?php echo get_stylesheet_directory_uri() . '/inc/contact-us.php'?>" method="post" >
							<div class="col-sm-6 first-name">
								<div class="col-sm-12 first-name-label">
									First Name
								</div>
								<div class="col-sm-12 full-width">
									<input type="text" name="contact-name" />
								</div>
							</div>
							<div class="col-sm-6 last-name">
								<div class="col-sm-12 last-name-label">
									Last Name
								</div>
								<div class="col-sm-12  full-width">
									<input type="text" name="contact-lastname" />
								</div>
							</div>
							<div class="col-sm-12 email">
								<div class="col-sm-12 email-label">
									Email
								</div>
								<div class="col-sm-12 full-width">
									<input type="text" name="contact-email" />
								</div>
							</div>
	
							<div class="col-sm-12 message">
								<div class="col-sm-12 message-label">
									Message
								</div>
								<div class="col-sm-12 full-width">
									<textarea rows="8" name="contact-message"></textarea>
								</div>
							</div>
							<div class="col-sm-12 submit-button">
								<div class="col-sm-12  alignright">
									<input type="submit" />
								</div>
							</div>
							<input type="hidden" name="redirect" value="<?php echo $url; ?>" />
							<input type="hidden" name="site-url" value="<?php echo WP_HOME ; ?>" />
							<?php if ( get_the_content() ) { ?>
							<input type="hidden" name="email-to" value="<?php echo get_the_content(); ?>" />
							<?php } ?>
							
						</form>
					</div>
					<div class="col-md-4 contact-info">
						<div class="col-sm-12 contact-info-title">
							Contact Information
						</div>
						<div class="col-sm-12 contact-info-details">
							<?php echo getContactInformation(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>		<!-- .entry-content -->
	</article>	<!-- #post-## -->
</div><!-- #content -->
