<?php

add_action( 'after_setup_theme', 'prolix_theme_setup' );

function prolix_theme_setup() {

	/* Add theme-supported features. */
	add_theme_support( 'post-thumbnails' );
}

?>
