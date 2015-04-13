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

        <div class="menu-indexmenu-container">
        <ul id="menu-indexmenu">
        <li><a href="<?php echo home_url('/')?>">Recent</a></li>
        <?php
            for ($m=date('n', strtotime('-1 month')); $m>0; $m--) {
             $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
             echo '<li><a href="', home_url('/'), '?m=20150';
             echo $m, '">', $month, '</a></li>';
        }
        ?>
        </ul>
        </div>
        <br/>

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

