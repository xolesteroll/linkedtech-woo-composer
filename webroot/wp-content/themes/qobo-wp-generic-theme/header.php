<?php
/**
 * The Header for Qobo Generic theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<title><?php wp_title( '', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo  get_template_directory_uri() . '/css/multilevel-menu.css' ?>">
	<link rel="stylesheet" href="<?php echo  get_template_directory_uri() . '/css/bootstrap-extension.css' ?>">
	<link rel="stylesheet" href="<?php echo  get_template_directory_uri() . '/css/flexslider.css' ?>">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

	<?php echo includeCustomCSS(); ?>

	<!-- Google fonts  -->

	<!-- /Google fonts -->

	<?php wp_head(); ?>
	
	<script>
	function onLoad(){
		var hasRun = false;
		
		if (typeof createFlexSlider == 'function') {  
			console.log('createFlexSlider') ;
			hasRun = createFlexSlider('#carousel,#slider');
		} 
		if (typeof stretch == 'function' && !hasRun) {  
			console.log('stretch') ; 
			stretch(); 
		}
		if (typeof makeSlimScroll == 'function') {  
			console.log('slim-scroll') ; 
			makeSlimScroll('.slim-scroll'); 
		}
		if (typeof sameHeight == 'function') {  
			console.log('sameHeight') ;
			sameHeight('.news-item img,.news-item .news-text,.gallery img,.list-item-image img'); 
		}
		if (typeof moreFunctions == 'function') {  
			console.log('moreFunctions') ;
			moreFunctions(); 
		}
	}
	</script>
</head>


<body <?php body_class(); ?> onload="onLoad()">
	<div id="page">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img
				src="<?php header_image(); ?>"
				width="<?php echo get_custom_header() -> width; ?>"
				height="<?php echo get_custom_header() -> height; ?>" alt="">
			</a>
		</div>
	<?php endif; ?>

	<header id="masthead" class="site-header">
		<div class="header-logo wrap clearfix">
			<h1 class="logo">
				<a href="<?php bloginfo( 'url' )?>" title="Company logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Company logo">
				</a>
			</h1>
			<!--//logo-->
		</div>
		<nav class="navbar navbar-default" role="navigation">
			<!--logo-->
			
			<div class="header-menu wrap clearfix">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-bar">
						<span class="sr-only">Toggle navigation</span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div id="header-bar" class=" collapse navbar-collapse ">
				<?php
				$defaults = array(
				// 'theme_location' => 'header-menu',
					'menu' => 'Main Menu',
					'container' => '',
					'container_class' => '',
					'menu_class' => 'nav navbar-nav ',
					'depth' => 0,
					'fallback_cb' => 'qobogt_wp_bootstrap_navwalker::fallback',
					'walker' => new qobogt_wp_bootstrap_navwalker(),
				);
				wp_nav_menu( $defaults );
				?>
				</div>
			</div>  <!-- /.container-fluid -->
		</nav>
	</header> <!-- #masthead -->
	<div id="main" >
