<?php

require get_theme_file_path('/inc/gmaps.php');

function brook_house_theme_files() {
	wp_enqueue_style('custom-google-font', '//fonts.googleapis.com/css?family=Parisienne|Poiret+One'); //Google Font
	wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.0.13/css/all.css'); //Font Awesome
	wp_enqueue_style('slick-styling', get_theme_file_uri('/css/slick-style.css'), NULL, microtime());
	wp_enqueue_style('main-styling', get_theme_file_uri('/css/main.css'), NULL, microtime());
	wp_enqueue_style('mobile-styling', get_theme_file_uri('/css/mobile.css'), NULL, microtime());
	//wp_enqueue_script('google-map', '//maps.googleapis.com/maps/api/js?key=AIzaSyColr51jEy3k4Wqp5LHXpHeFTGVObnhy0M', NULL,  true);
	wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/google-maps.js', array('google-map', 'jquery'), '0.1', true );
	wp_enqueue_script('lazy-loading', '//cdn.jsdelivr.net/npm/lozad', NULL, true);
	wp_enqueue_script('slick-js', get_theme_file_uri('/js/slick.js'), array( 'jquery' ), '0.1', true);
	wp_enqueue_script('main-js', get_theme_file_uri('/js/scripts.js'), array( 'jquery' ), microtime(), true);
}
add_action('wp_enqueue_scripts', 'brook_house_theme_files');



//Remove autp P tags
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

//
//removes header admin bar
function theme_features() {
	add_theme_support('title-tag');
  	register_nav_menu('header-menu',__( 'Header Menu' ));
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_features');

function remove_admin_login_header() { //Removes Admin Header Bar
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');

show_admin_bar( false );

//Gmaps
// function my_acf_google_map_api( $api ){
	
// 	$api['key'] = 'AIzaSyColr51jEy3k4Wqp5LHXpHeFTGVObnhy0M';
	
// 	return $api;
	
// }
// add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function get_post_gallery_images_with_info($postvar = NULL) {
    if(!isset($postvar)){
        global $post;
        $postvar = $post;//if the param wasnt sent
    }

//Allow image metadata to be ruturned
    $post_content = $postvar->post_content;
    preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
    $images_id = explode(",", $ids[1]); //we get the list of IDs of the gallery as an Array


    $image_gallery_with_info = array();
    //we get the info for each ID
    foreach ($images_id as $image_id) {
        $attachment = get_post($image_id);
        array_push($image_gallery_with_info, array(
            'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink($attachment->ID),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
                )
        );
    }
    return $image_gallery_with_info;
}

//Remove comments from all admin screens
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );