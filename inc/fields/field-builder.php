<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$additional_fields = glob( get_stylesheet_directory() . '/inc/fields/additional/*.php' );
$flex_fields = glob( get_stylesheet_directory() . '/template-parts/flex/**/fields.php' );
$fields = [];
$scrollspy = include 'shared/scrollspy.php';

foreach ($additional_fields as $flex_field) {
	include $flex_field;
}

foreach ($flex_fields as $flex_field) {
	$new_field = include $flex_field;
	$new_field->addFields($scrollspy->getFields());
	$fields[] = $new_field;
}

$content = new FieldsBuilder('main_content');
$content->addFlexibleContent('main_content_flex')->addLayouts($fields);
$content->setLocation('post_type', '==', 'page');

$content->setGroupConfig('position', 'acf_after_title');
$content->setGroupConfig('menu_order', 2);
$content->setGroupConfig('hide_on_screen', ['the_content']);

add_action('acf/init', function() use ($content) {
	$build_fields = $content->build();

	// // ACF Extended Configuration
	$build_fields['fields'][0]["acfe_flexible_advanced"] = 1;
	$build_fields['fields'][0]["acfe_flexible_stylised_button"] = 1;
	$build_fields['fields'][0]["acfe_flexible_hide_empty_message"] = 0;
	$build_fields['fields'][0]["acfe_flexible_empty_message"] = "";
	$build_fields['fields'][0]["acfe_flexible_disable_ajax_title"] = 1;
	$build_fields['fields'][0]["acfe_flexible_layouts_thumbnails"] = 1;
	$build_fields['fields'][0]["acfe_flexible_layouts_settings"] = 0;
	$build_fields['fields'][0]["acfe_flexible_layouts_ajax"] = 1;
	$build_fields['fields'][0]["acfe_flexible_layouts_templates"] = 1;
	$build_fields['fields'][0]["acfe_flexible_layouts_previews"] = 1;
	$build_fields['fields'][0]["acfe_flexible_layouts_placeholder"] = 0;
	$build_fields['fields'][0]["acfe_flexible_title_edition"] = 0;
	$build_fields['fields'][0]["acfe_flexible_clone"] = 0;
	$build_fields['fields'][0]["acfe_flexible_copy_paste"] = 0;
	$build_fields['fields'][0]["acfe_flexible_toggle"] = 0;
	$build_fields['fields'][0]["acfe_flexible_close_button"] = 1;
	$build_fields['fields'][0]["acfe_flexible_remove_add_button"] = 0;
	$build_fields['fields'][0]["acfe_flexible_remove_duplicate_button"] = 0;
	$build_fields['fields'][0]["acfe_flexible_remove_delete_button"] = 0;
	$build_fields['fields'][0]["acfe_flexible_lock"] = 0;
	$build_fields['fields'][0]["acfe_flexible_modal_edition"] = 1;
	$build_fields['fields'][0]["acfe_flexible_modal"] = [
		"acfe_flexible_modal_enabled" => "1",
		"acfe_flexible_modal_title" => "",
		"acfe_flexible_modal_col" => "4",
		"acfe_flexible_modal_categories" => "0"
	];
	$build_fields["acfe_flexible_layouts_state"] = "";
	$build_fields["acfe_flexible_layouts_remove_collapse"] = 0;

	// acf_add_local_field_group($build_fields);
	acf_add_local_field_group($build_fields);
});
