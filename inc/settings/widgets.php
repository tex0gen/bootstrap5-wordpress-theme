<?php
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

	register_sidebar( array(
		'name'          => 'Woocommerce Archive Sidebar',
		'id'            => 'woocommerce_archive_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'enabled_widget_areas' );