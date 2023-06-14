<?php
use StoutLogic\AcfBuilder\FieldsBuilder;
$logos = new FieldsBuilder('logos');
$logos
	->addRepeater('logos', [
		'label' => 'Logos',
		'layout' => 'block',
		'button_label' => 'Add Logo',
		'min' => 1,
		'max' => 0,
	])
	->addImage('image', [
		'label' => 'Image',
		'required' => 1,
		'return_format' => 'id',
		'library' => 'all'
	])
	->addLink('link', [
		'label' => 'Link',
		'required' => 0,
	]);

return $logos;
