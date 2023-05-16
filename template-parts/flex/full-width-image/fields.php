<?php
use StoutLogic\AcfBuilder\FieldsBuilder;
$full_width_image = new FieldsBuilder('full_width_image');
$full_width_image
	->addImage('image', [
		'label' => 'Image',
		'required' => 1,
		'return_format' => 'array',
		'library' => 'all',
		'min_width' => 1200,
		'min_height' => 800,
	]);

return $full_width_image;
