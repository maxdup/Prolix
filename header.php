<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php bloginfo('title')?></title>
	<?php wp_head()?>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory');?>/concat.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory')?>/prolix.css">
</head>

<div id="container">
	<div class="sidebar">
		<header>
			<h1 class="title"><a href="<?php echo home_url('/')?>"><?php bloginfo('name')?></a></h1>
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

