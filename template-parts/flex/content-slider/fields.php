<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('content_slider');
$builder
	->addText('title')
	->addRepeater('slides', [
		'button_label' => 'Add Slide',
		'layout' => 'block',
	])
		->addImage('image',
			[
				'label' => 'Image',
				'return_format' => 'id',
			]
		)
		->addWysiwyg('content')
		->addTrueFalse('swap_position')
	->endRepeater();

return $builder;
