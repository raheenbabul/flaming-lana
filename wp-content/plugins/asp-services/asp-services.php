<?php
/*
  Plugin Name: Asplundh Services
  Plugin URI: HTTP://WWW.ANNET.COM
  Description: Services
  Author: Annet Technologies
  Version: 1.0
  Author URI: http://www.annet.com/
 */
add_action('init', 'register_custom_post_type_asp_Services');

function register_custom_post_type_asp_Services() {
  $labels = array(
      'name' => _x('Services', 'asp-services'),
      'post_type'=>_x('Services', 'asp-services'),
      'singular_name' => _x('Services', 'asp-services'),
      'add_new' => _x('Add New', 'asp-services'),
      'add_new_item' => _x('Add New Services', 'asp-services'),
      'edit_item' => _x('Edit Services', 'asp-services'),
      'new_item' => _x('New Services', 'asp-services'),
      'view_item' => _x('View Services', 'asp-services'),
      'search_items' => _x('Search Services', 'asp-services'),
      'not_found' => _x('No Services found', 'asp-services'),
      'not_found_in_trash' => _x('No Services found in Trash', 'asp-services'),
      'parent_item_colon' => _x('Parent Services:', 'asp-services'),
      'menu_name' => _x('Services', 'asp-services'),
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'description' => 'Services',
      'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
	  'taxonomies'          => array( 'category'),
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => 'asp-services',
      'can_export' => true,
      'rewrite' => array('slug' => 'asp-services'),
      'capability_type' => 'post',
//        'menu_position' => 100,
      //'show_in_menu' => 'ret-sect-all/index.php',
  );

  register_post_type('asp-services', $args);
}
