<?php
/*
Plugin Name: Nebula Custom Post Type
Description: Plugin for creating a custom post type (EVENT)
Version: 1.0.0
Author: Katrine-Marie Burmeister
Author URI: https://fjordstudio.dk
*/

//Custom post types
class CustomPosttype {

  function __construct(){
    add_action('init', array($this,'create_post_type'));
  }

  function create_post_type(){
    register_post_type('event', array('labels' => array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
        'add_new' => __('Add new'),
        'add_new_item' => __('Add new event'),
	      'edit_item' => __('Edit Event'),
	      'new_item' => __('New Event'),
	      'view_item' => __('View Event'),
	      'view_items' => __('View Events'),
	      'search_items' => __('Search Events'),
	      'all_items' => __('All Events')
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_nav_menus' => true,
      'menu_icon' => 'dashicons-calendar-alt',
      'taxonomies' => array('category', 'post_tag')
      )
    );
  }

}

$event = new CustomPosttype();

?>
