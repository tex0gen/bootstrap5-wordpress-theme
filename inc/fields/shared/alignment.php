<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$alignment = new FieldsBuilder('alignment');

$choices = [
	'' => 'Auto',
	'start' => 'Left',
	'center' => 'Center',
	'end' => 'Right',
];

$alignment
	->addGroup('alignment')
		->addSelect('alignment_desktop', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
		->addSelect('alignment_tablet', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
		->addSelect('alignment_mobile', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
	->endGroup();

return $alignment;


