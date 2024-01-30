<?php

add_action( 'wp_enqueue_scripts', 'addScripts' );
function addScripts(){
	wp_enqueue_script( 'my-script', 'src', ['deps'], '1.0', 'in_footer' );
	wp_enqueue_style(  'my-style',  'src', ['deps'], '1.0', 'all' );
}

add_action( 'after_setup_theme', 'themeSupports' );
function themeSupports() {
    add_theme_support( 'post-thumbnails', array( 'post' ) );

    register_nav_menus( [
		'header_menu' => 'Header menu',
	] );

    add_theme_support( 'custom-logo', [
        'height'      => 190,
        'width'       => 190,
        'flex-width'  => false,
        'flex-height' => false,
        'header-text' => '',
        'unlink-homepage-logo' => false,
    ] );
}

add_action( 'init', 'themeInit'); 
function themeInit() {
    if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
}
?>