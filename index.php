<?php
/*
Plugin Name: Nebula Custom Post Type
Description: Plugin for creating a custom post type (EVENT)
Version: 1.0.0
Author: Katrine-Marie Burmeister
*/

//Custom post types
class CustomPosttype {
  private $labels;

  function __construct($labels){
    $this->labels = $labels;
    add_action('init', array($this,'create_post_type'));
  }

  function create_post_type(){
    register_post_type('event', array(
      'labels' => $this->labels,
      'public' => true,
      'has_archive' => true,
      'show_in_nav_menus' => true,
      'menu_icon' => 'dashicons-calendar-alt',
      'taxonomies' => array('category', 'post_tag')
      )
    );
  }

}

$labels = array(
	'name' => __('Events'),
	'singular_name' => __('Event'),
	'add_new' => __('Add New'),
	'add_new_item' => __('Add New Event'),
	'edit_item' => __('Edit Event'),
	'new_item' => __('New Event'),
	'view_item' => __('View Event'),
	'view_items' => __('View Events'),
	'search_items' => __('Search Events'),
	'all_items' => __('All Events')
);

$event = new CustomPosttype();

?>
