<?php
/**
 * Standard WordPress functions and our custom post type
 */

add_theme_support( 'post-thumbnails' );

// Add styles
function theme_styles() {
  wp_enqueue_style('styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_styles');

// Clean up menu
function remove_menus() {
  remove_menu_page('edit.php');
  remove_menu_page('upload.php');
  remove_menu_page('edit-comments.php');
  remove_menu_page('themes.php' );
  remove_menu_page('plugins.php' );
  remove_menu_page('users.php' );
  remove_menu_page('tools.php' );
}
add_action('admin_menu', 'remove_menus');

// Post Types
function postTypes() {
  register_post_type( 'course_athlete',
    array(
      'labels' => array(
        'name' => __( 'Athletes' ),
        'singular_name' => __( 'Athlete' ),
        'menu_name' => 'Athletes',
        'edit_item' => 'Edit Athlete',
        'view_item' => 'View Athlete',
        'add_new' => 'Add Athlete',
        'add_new_item' => 'Add New Athlete'
      ),
      'public' => true,
      'hierarchical' => true,
      'menu_icon' => 'dashicons-groups',
      'has_archive' => true,
      'show_in_rest' => true,
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
      'capability_type' => 'page',
      'supports' => array('title', 'thumbnail'),
      'rewrite'=> array( 'slug' => 'athletes' )
    )
  );
  register_taxonomy(
    'athlete_sport',
    'course_athlete',
    array(
      'labels' => array(
        'name' => __( 'Sports' ),
        'add_new_item' => __('Add new Sport')
      ),
      'rewrite' => array( 'slug' => 'athlete-sports' ),
      'hierarchical' => true,
      'show_in_rest' => true,
    )
  );
}

add_action('init', 'postTypes');