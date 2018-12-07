<?php
/*
Plugin Name: Nebula Custom Post Type
Description: Plugin for creating a custom post type
Version: 1.0.0
Author: Katrine-Marie Burmeister
Author URI: https://fjordstudio.dk
*/

require_once(__DIR__.'/includes/admin-page.php');

class CustomPosttype {
  private $labels;
  private $icon;

  function __construct($labels, $icon){
    $this->labels = $labels;
    $this->icon = $icon;
    add_action('init', array($this,'create_post_type'));
  }

  function create_post_type(){
    register_post_type('event', array(
      'labels' => $this->labels,
      'public' => true,
      'has_archive' => true,
      'show_in_nav_menus' => true,
      'menu_icon' => $this->icon,
      'taxonomies' => array('category', 'post_tag')
      )
    );
  }

}

$labels = array(
	'name' => get_option('myplugin_option_name'),
	'singular_name' => get_option('myplugin_option_name'),
	'add_new' => __('Add New'),
	'add_new_item' => 'Add New '.get_option('myplugin_option_name'),
	'edit_item' => 'Edit '.get_option('myplugin_option_name'),
	'new_item' => 'New '.get_option('myplugin_option_name'),
	'view_item' => 'View '.get_option('myplugin_option_name'),
	'view_items' => 'View '.get_option('myplugin_option_name_plural'),
	'search_items' => 'Search '.get_option('myplugin_option_name_plural'),
	'all_items' => 'All '.get_option('myplugin_option_name_plural')
);

$icon = get_option('myplugin_option_icon');

$posttype = new CustomPosttype($labels, $icon);

?>
