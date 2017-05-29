<?php
/*
*	Image Sizes
*/
add_image_size( 'full-width', 1200, 800, true );
add_image_size( 'post-thumbnail', 800, 650, true );
add_image_size( 'card', 600, 350, true );


/*
*	Sidebar Widget Areas
*/
function enabled_widget_areas() {

	register_sidebar( array(
		'name'          => 'Blog Archive Sidebar',
		'id'            => 'blog_archive_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Blog Single Sidebar',
		'id'            => 'blog_single_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Archive Sidebar',
		'id'            => 'archive_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'enabled_widget_areas' );

/*
*	Options Pages for ACF
*/
if( function_exists('acf_add_options_page') ) {
	$args = array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'position' => 2,
	);
	
	acf_add_options_page( $args );
}