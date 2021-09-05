<?php
/**
 * Sets up a custom endpoint with our data
 */

function get_athletes() {
  $query = new WP_Query(array(
    'post_type' => 'course_athlete',
    'posts_per_page' => 3
  ));
  $posts = $query->posts;
  $athletes = [];
  foreach($posts as $post) {
    array_push($athletes, array(
      'name' => $post->post_title,
      'image' => get_the_post_thumbnail_url($post->ID),
      'sport' => get_the_terms($post->ID, 'athlete_sport')[0]->name
    ));
  }

  global $wp_post_types;
  $description = $wp_post_types['course_athlete']->description;
  $home = get_page_by_path('home');

  $response = new WP_REST_Response(array(
    'hero' => apply_filters('the_content', $home->post_content),
    'athletes' => [      
      'title' => $description,
      'cards' => $athletes
    ],
    'seo' => [
      'title' => get_bloginfo('name'),
      'description' => get_bloginfo('description')
    ]
  ));
  $response->set_status(200);
  return $response;
}
add_action( 'rest_api_init', function () {
  register_rest_route( 'course/v1', 'content/', array(
    'methods' => 'GET',
    'callback' => 'get_athletes',
  ));
});