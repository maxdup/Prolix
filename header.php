<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php bloginfo('title')?></title>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
	<?php wp_head()?>
</head>

<div id="container">
	<div class="sidebar">
		<header>
			<h1 class="title"><a href="<?php echo home_url('/')?>"><?php bloginfo('name')?></a></h1>
			<h1 class="dax">Daxime Mupuis</h1>
		</header>
		<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		<nav>
			<?php wp_nav_menu();?>
		</nav>
	</div>
