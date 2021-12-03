<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

?>

</div><!-- #main -->
<footer>
	<div class="footer-area row non-fullscreen">
		<div class="row footer-sidebar">
			<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
				<?php dynamic_sidebar( 'footer-widget-1' ); ?>
				<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
				<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
				<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
				<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				<?php endif; ?>
		</div>
		<div class="row under-footer">
			<?php if ( is_active_sidebar( 'footer-widget-5' ) ) : ?>
				<?php dynamic_sidebar( 'footer-widget-5' ); ?>
				<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-widget-6' ) ) : ?>
				<?php dynamic_sidebar( 'footer-widget-6' ); ?>
				<?php endif; ?>

				<?php the_widget( 'QBDEVBY_Widget' ); ?>
		</div>
	</div>
</footer><!-- footer -->
</div><!-- #page -->

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type='text/javascript'
	src='<?php echo get_template_directory_uri(); ?>/js/qobobgt.js'></script>
<script type='text/javascript'
	src='<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js'></script>
<script type='text/javascript'
	src='<?php echo get_template_directory_uri(); ?>/js/jquery.slimscroll.min.js'></script>

<?php echo includeCustomJS(); ?>
<?php wp_footer(); ?>

</body>
</html>
