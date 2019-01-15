<?php
function custom_post_types() {
//Exmouth post type
	register_post_type('exmouth', array(
		'supports' => array('title', 'editor', 'excerpt', 'page-attributes'),
		'rewrite' => array('slug' => 'exmouth'),
		'capability_type' => 'Exmouth',
		'map_meta_cap' => true,
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
		'menu_icon' => 'dashicons-format-status',
	));		

	//Review post type
	register_post_type('Review', array(
		'supports' => array('title', 'editor'),
		'rewrite' => array('slug' => 'Reviews'),
		'capability_type' => 'Reviews',
		'map_meta_cap' => true,
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

