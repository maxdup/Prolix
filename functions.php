<?php

if ( ! function_exists( 'prolix_theme_setup' ) ) :
function prolix_theme_setup() {

	/* Add theme-supported features. */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('image', 'video', 'link', 'gallery') );
	/* implement later: status/quote */
}
endif;



add_action( 'after_setup_theme', 'prolix_theme_setup' );

function prolix_nav_menu_filter(){
	//refactor? https://gist.github.com/hitautodestruct/4345363

	$args = array( 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'nav_menu_item',
	'post_status' => 'publish', 'output' => ARRAY_A, 'output_key' => 'menu_order', 'nopaging' => true 		);
	$items = wp_get_nav_menu_items( 'indexmenu' ,$args); //todo make indexmenu not hard coded 
	echo '<div class="menu-indexmenu-container">';
	echo '<ul id="menu-', 'indexmenu', '" class="menu"> <li>';
	foreach($items as $menu){
		
		if ($menu->type_label == 'Category'){
			echo '<li><div class="filter"><a href="',$menu->url,'" data-filter=".',
				str_replace(' ', '',$menu->title), '">',
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
<!--Gallery shorcode override-->
<?php 

add_shortcode('gallery', 'my_gallery_shortcode');   
update_option('thumbnail_size_w', 600);
update_option('thumbnail_size_h', 332);
function my_gallery_shortcode($attr) {
    	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
	    // 'ids' is explicitly ordered, unless you specify otherwise.
	    if ( empty( $attr['orderby'] ) )
		$attr['orderby'] = 'post__in';
	    $attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
	    return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
	    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
	    if ( !$attr['orderby'] )
		unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
	    'order'      => 'ASC',
	    'orderby'    => 'menu_order ID',
	    'id'         => $post->ID,
	    'itemtag'    => 'dl',
	    'icontag'    => 'dt',
	    'captiontag' => 'dd',
	    'columns'    => 3,
	    'size'       => 'thumbnail',
	    'include'    => '',
	    'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
	    $orderby = 'none';

	if ( !empty($include) ) {
	    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

	    $attachments = array();
	    foreach ( $_attachments as $key => $val ) {
		$attachments[$val->ID] = $_attachments[$key];
	    }
	} elseif ( !empty($exclude) ) {
	    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
	    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
	    return '';

	if ( is_feed() ) {
	    $output = "\n";
	    foreach ( $attachments as $att_id => $attachment )
		$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
	    return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
	    $itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
	    $captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
	    $icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
	    $gallery_style = "
	    <style type='text/css'>
		#{$selector} {
		    margin: auto;
		}
		#{$selector} .gallery-item {
		    float: {$float};
		    margin-top: 10px;
		    text-align: center;
		    width: {$itemwidth}%;
		}
		#{$selector} img {
		    border: 2px solid #cfcfcf;
		}
		#{$selector} .gallery-caption {
		    margin-left: 0;
		}
	    </style>
    <!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	//$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;

	$todo = 'carname';
	$output .= "<div class='carouselgallery'><div class='carousel slide' id='carousel-{$todo}' style='height:332px; width:600px;'><div class='carousel-inner'>";
	
	$active = "active";
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image_src($id, $size, false, false) : wp_get_attachment_images_src($id, 'thumbnail', true, false);

		$output .="<div class='slide {$active}'>";
		$output .= "<a href='$link[0]' class='lightbox'><img src='$link[0]'></a>"; // todo dynamise this, class="portrait"
		$output .= "</div>";
	$active = '';
	}
	$output .= "</div><a class='left carousel-control' href='#carousel-{$todo}' data-slide='prev'><span class='helper-left'>&lt;</span></a><a class='right carousel-control' href='#carousel-{$todo}' data-slide='next'><span class='helper-right'>&gt;</span></a>";
	$output .= '</div></div>';

return $output;
}?>


