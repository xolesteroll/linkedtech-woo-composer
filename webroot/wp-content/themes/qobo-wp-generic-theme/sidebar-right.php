<?php
/**
 * The Right 1 Sidebar containing the main widgets
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

?>
<div class="sidebar col-sm-3">
	<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area " role="complementary">
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
