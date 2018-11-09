<?php
/*
Plugin Name: Nebula Custom Post Type
Description: Plugin for creating a custom post type (EVENT)
Version: 1.0.0
Author: Katrine-Marie Burmeister
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
        'add_new_item' => __('Add new event')
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
