<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$buttons = include get_stylesheet_directory() . '/inc/fields/shared/buttons.php';
$width = include get_stylesheet_directory() . '/inc/fields/shared/width.php';
$alignment = include get_stylesheet_directory() . '/inc/fields/shared/alignment.php';
$valignment = include get_stylesheet_directory() . '/inc/fields/shared/vertical-alignment.php';

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
	->addFields($valignment)
	->addRepeater('content', ['button_label' => 'Add Column', 'layout' => 'block'])
		->addSelect('content_type', [
			'label' => 'Content Type',
			'choices' => [
				'wysiwyg' => 'WYSIWYG',
				'image' => 'Image',
				'video' => 'Video',
			],
			'default_value' => 'wysiwyg',
		])
		// make all the below conditional
		->addText('title', [
			'instructions' => 'This title will have more margin on the bottom than using headings in the body of your copy.',
			'wrapper' => [
				'width' => '50',
			],
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'wysiwyg',
					],
				],
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
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'wysiwyg',
					],
				],
			],
		])
		->addWysiwyg('content_item', [
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'wysiwyg',
					],
				],
			],
		])
		->addTextarea('video_embed', [
			'instructions' => 'Paste the embed code from YouTube or Vimeo here.',
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'video',
					],
				],
			],
		])
		->addImage('image', [
			'return_format' => 'id',
			'wrapper' => [
				'width' => '50',
			],
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'image',
					],
				],
			],
		])
		->addSelect('image_cutout', [
			'label' => 'Image Shape Cut',
			'choices' => [
				'none' => 'None',
				'rounded' => 'Rounded',
				'circle' => 'Circle',
				'blob' => 'Blob',
			],
			'default_value' => 'none',
			'wrapper' => [
				'width' => '50',
			],
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'image',
					],
				],
			],
		])
		->addFields($width)
		->addFields($buttons, [
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '!=',
						'value' => 'image',
					],
				],
			],
		])

	->endRepeater()
	->addText('classes');

return $builder;
