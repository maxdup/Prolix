<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php bloginfo('title')?></title>
	<?php wp_head()?>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url')?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/lightbox/magnific-popup.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory')?>/prolix.css">
	<!--<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/prolix.less" />-->
	<link rel="stylesheet" type="text/javascript" href="<?php bloginfo('stylesheet_directory'); ?>/carousel/carousel.css" media="all" >

	
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!--<script src="<?php bloginfo('stylesheet_directory'); ?>/js/less-1.6.2.min.js" type="text/javascript"></script>-->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/carousel/carousel.js" type="text/javascript"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/carousel/transition.js" type="text/javascript"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/lightbox/jquery.magnific-popup.min.js" type="text/javascript"></script>
</head>

<div id="container">
	<div class="sidebar">
		<header>
			<h1 class="title"><a href="<?php echo home_url('/')?>"><?php bloginfo('name')?></a></h1>
			<h1 class="dax">Daxime Mupuis</h1>
		</header>
		<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		<nav>
		<?php
			if(is_front_page()){
				prolix_nav_menu_filter();				
			}
			else{
				prolix_nav_menu();
			}
		?>
		</nav>
	<?php get_sidebar() ?>
	</div>

