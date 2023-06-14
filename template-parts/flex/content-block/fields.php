<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$buttons = include get_stylesheet_directory() . '/inc/fields/shared/buttons.php';
$width = include get_stylesheet_directory() . '/inc/fields/shared/width.php';
$alignment = include get_stylesheet_directory() . '/inc/fields/shared/alignment.php';

$builder = new FieldsBuilder('content_block');
$builder
	->addField('background_colour', 'COLOR_PICKER_EXT')
	->addImage('background_image', ['return_format' => 'id'])
	->addSelect('overlay', [
		'label' => 'Overlay',
		'choices' => [
			'none' => 'None',
			'dark' => 'Dark',
			'light' => 'Light',
		],
		'default_value' => 'none',
	])
	->addFields($alignment)
	->addRepeater('content', ['button_label' => 'Add Column', 'layout' => 'block'])
		->addText('title', [
			'instructions' => 'This title will have more margin on the bottom than using headings in the body of your copy.',
			'wrapper' => [
				'width' => '50',
			],
		])
		->addSelect('title_type', [
			'label' => 'Title Type',
			'choices' => [
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6',
			],
			'default_value' => 'h2',
			'wrapper' => [
				'width' => '50',
			],
		])
		->addWysiwyg('content_item')
		->addFields($width)
		->addFields($buttons)
	->endRepeater()
	->addText('classes');

return $builder;
