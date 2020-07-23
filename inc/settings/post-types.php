<?php
/*
* Custom Post Types
*/
function create_post_type() {
  register_post_type( 'my-post-type',
    array(
      'labels' => array(
        'name' => __( 'My Post Type' ),
        'singular_name' => __( 'Post Type' )
      ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

// add_action( 'init', 'create_post_type' );