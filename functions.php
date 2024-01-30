<?php
require_once __DIR__."/config.php";
add_action( 'wp_enqueue_scripts', 'addScripts' );
function addScripts(){
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'slick', TEMPLATE_URL . '/assets/js/slick.js', [], '1.0', true );
	wp_enqueue_script( 'script', TEMPLATE_URL . '/assets/js/script.js', [], '1.0', true );
	wp_enqueue_script( 'gallery', TEMPLATE_URL . '/assets/js/gallery.js', [], '1.0', true );

	wp_enqueue_style(  'reset',  TEMPLATE_URL . '/assets/css/reset.min.css', [], '1.0', 'all' );
	wp_enqueue_style(  'font-awesome',  TEMPLATE_URL . '/assets/css/all.min.css', [], '1.0', 'all' );
	wp_enqueue_style(  'style',  TEMPLATE_URL . '/assets/css/style.min.css', [], '1.0', 'all' );
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

add_action( 'init', 'disableAdminBar'); 
function disableAdminBar() {
    if ( ! current_user_can( 'admin' ) ) {
		show_admin_bar( false );
	}
}

add_action( 'init', 'registerTaxonomies'); 
function registerTaxonomies() {
    register_taxonomy( 'event', [ 'post' ], [
		'labels'                => [
			'name'              => 'Events',
			'singular_name'     => 'Event',
			'search_items'      => 'Search Events',
			'all_items'         => 'All Events',
			'view_item '        => 'View Events',
			'parent_item'       => 'Parent Event',
			'parent_item_colon' => 'Parent Event:',
			'edit_item'         => 'Edit Event',
			'update_item'       => 'Update Event',
			'add_new_item'      => 'Add New Event',
			'new_item_name'     => 'New Event Name',
			'menu_name'         => 'Event',
			'back_to_items'     => '← Back to Events',
		],
		'description'           => 'Events', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
	] );
}
?>