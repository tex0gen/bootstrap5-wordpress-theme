<?php
/**
 * ACF Extended Modules.
 *
 * ACF Extended module selection
 *
 * @package Themestrap
 * @since 1.0.3
 */

add_action( 'acf/init', 'themestrap_acfe_modules' );
function themestrap_acfe_modules() {
	if ( function_exists( 'acf_update_setting' ) ) {
		acf_update_setting( 'acfe/modules/author', false );
		acf_update_setting( 'acfe/modules/taxonomies', false );
		acf_update_setting( 'acfe/modules/post_types', false );
		acf_update_setting( 'acfe/modules/forms', false );
		acf_update_setting( 'acfe/modules/categories', false );
		acf_update_setting( 'acfe/modules/options_pages', false );
		acf_update_setting( 'acfe/modules/multilang', false );
		acf_update_setting( 'acfe/modules/options', false );
		acf_update_setting( 'acfe/php', false );
	}
}

// Preview layout
add_filter( 'acfe/flexible/render/template', 'my_acf_layout_template', 10, 4 );
function my_acf_layout_template( $template, $field, $layout, $is_preview ) {
	$file_name = str_replace('_', '-', $layout['name']);
	$file = get_stylesheet_directory() . '/template-parts/flex/' . $file_name . '/' . $file_name . '.php';
	return $file;
}

// Thumbnail preview
add_filter( 'acfe/flexible/thumbnail', 'my_acf_layout_thumbnail', 10, 3 );
function my_acf_layout_thumbnail( $thumbnail, $field, $layout ) {
	$file_name = str_replace('_', '-', $layout['name']);
	return get_stylesheet_directory_uri() . '/template-parts/flex/' . $file_name . '/' . $file_name . '.jpg';
}

// Stylesheet preview rendering
add_filter( 'acfe/flexible/render/style', 'my_acf_layout_style', 10, 4 );
function my_acf_layout_style( $file, $field, $layout, $is_preview ) {
	$file_name = str_replace('_', '-', $layout['name']);
	$file = get_stylesheet_directory() . '/template-parts/flex/' . $file_name . '/build/block.css';
	return $file;
}
