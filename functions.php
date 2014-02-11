<?php

if ( ! function_exists( 'prolix_theme_setup' ) ) :
function prolix_theme_setup() {

	/* Add theme-supported features. */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('image', 'video', 'link') );
	/* implement later: gallery/status/quote/link */
}
endif;


add_action( 'after_setup_theme', 'prolix_theme_setup' );
add_action('wp_head', 'prolix_theme_setup');//remove this line in prod

?>
