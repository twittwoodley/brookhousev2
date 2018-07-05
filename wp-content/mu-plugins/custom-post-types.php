<?php
function custom_post_types() {

	register_post_type('exmouth', array(
		'supports' => array('title', 'editor', 'excerpt', 'page-attributes'),
		'rewrite' => array('slug' => 'exmouth'),
		'has_archive' => true,
		'public' => true,
		'taxonomies'  => array( 'category' ),
		'labels' => array(
			'name' => 'Exmouth',
			'add_new_item' => 'Add New Post',
			'edit_item' => 'Edit Post',
			'all_items' => 'All Posts',
			'singular_name' => 'Posts'
		),
		'menu_icon' => 'dashicons-format-status'
	));		

	//Campus post type
	register_post_type('Review', array(
		'supports' => array('title', 'editor'),
		'rewrite' => array('slug' => 'Reviews'),
		'has_archive' => false,
		'public' => true,
		'labels' => array(
			'name' => 'Reviews',
			'add_new_item' => 'Add New Review',
			'edit_item' => 'Edit Review',
			'all_items' => 'All Reviews',
			'singular_name' => 'Review'
		),
		'menu_icon' => 'dashicons-star-filled'
	));
}

add_action('init', 'custom_post_types');
?>