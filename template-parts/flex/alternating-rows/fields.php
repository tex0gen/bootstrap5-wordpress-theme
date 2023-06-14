<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$buttons = include get_stylesheet_directory() . '/inc/fields/shared/buttons.php';

$builder = new FieldsBuilder('alternating_rows');

$builder
	// ->addTrueFalse('cutouts')
	// ->addTrueFalse('animate')
	->addText('title')
	->addRepeater('rows', ['button_label' => 'Add Row', 'layout' => 'row'])
		->addImage('image', ['return_format' => 'id'])
		->addText('heading')
		->addWysiwyg('text', [ 'media_upload' => 0 ])
		->addFields($buttons)
		->addField('background_colour', 'COLOR_PICKER_EXT')
		->addTrueFalse('swap_positions')
	->endRepeater();

return $builder;
