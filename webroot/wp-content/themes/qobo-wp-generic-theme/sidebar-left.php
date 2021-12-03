<?php
/**
 * The Left 1 Sidebar containing the property finder
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

?>
<div class="sidebar col-sm-3">
	<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area " role="complementary">
		<?php dynamic_sidebar( 'sidebar-left' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
