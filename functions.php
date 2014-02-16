<?php

if ( ! function_exists( 'prolix_theme_setup' ) ) :
function prolix_theme_setup() {

	/* Add theme-supported features. */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('image', 'video', 'link', 'gallery') );
	/* implement later: status/quote/link */
}
endif;



add_action( 'after_setup_theme', 'prolix_theme_setup' );
register_nav_menus( array( $location => $description ) );

function prolix_nav_menu_filter(){
	$args = array( 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'nav_menu_item',
	'post_status' => 'publish', 'output' => ARRAY_A, 'output_key' => 'menu_order', 'nopaging' => true );
	$items = wp_get_nav_menu_items( 'indexmenu' ,$args); //todo make indexmenu not hard coded 
	echo '<div class="menu-indexmenu-container">';
	echo '<ul id="menu-', 'indexmenu', '" class="menu"> <li>';
	foreach($items as $menu){
		
		if ($menu->type_label == 'Category'){
			echo '<li><div class="filter"><a href="#" data-filter=".',
				str_replace(' ', '',$menu->title), '">',
				$menu->title, '</a></div></li>';
		}
		else{
			if ($menu->type_label == 'Custom' and $menu->url == is_front_page()){
				 echo '<li><div class="filter"><a href="#" data-filter="*">',
				$menu->title, '</a></div></li>';
			}
			else{
				echo '<li id="menu-item-',$menu->ID,'" 
				class="menu-item menu-item-type-', $menu->type ,
				' menu-item-object-', $menu->object ,
				' menu-item-', $menu->ID,'" >
				<a href="', $menu->url, '">', $menu->title,'</a></li>';
			}
		}
	}
	echo '</ul>';
	echo '</div>';
}

function prolix_nav_menu(){
	$args = array( 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'nav_menu_item',
	'post_status' => 'publish', 'output' => ARRAY_A, 'output_key' => 'menu_order', 'nopaging' => true );
	$items = wp_get_nav_menu_items( 'indexmenu' ,$args); //todo make indexmenu not hard coded 
	
	echo '<div class="menu-indexmenu-container">';
	echo '<ul id="menu-', 'indexmenu', '" class="menu"> <li>';
	foreach($items as $menu){
		if ($menu->type_label == 'Category'){
			echo '<li><a href="', get_site_url() ,'?filter=',
				str_replace(' ', '',$menu->title), '">',
				$menu->title, '</a></li>';
		}
		else{
			echo '<li id="menu-item-',$menu->ID,'" 
				class="menu-item menu-item-type-', $menu->type ,
				' menu-item-object-', $menu->object ,
				' menu-item-', $menu->ID,'" >
				<a href="', $menu->url, '">', $menu->title,'</a></li>';
		}
	}
	echo '</ul>';
	echo '</div>';
}

?>
