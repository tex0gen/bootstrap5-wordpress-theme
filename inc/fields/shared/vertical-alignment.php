<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$valignment = new FieldsBuilder('vertical_alignment');

$choices = [
	'' => 'Auto',
	'start' => 'Top',
	'center' => 'Middle',
	'end' => 'Bottom',
];

$valignment
	->addGroup('vertical_alignment')
		->addSelect('vertical_alignment_desktop', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
		->addSelect('vertical_alignment_tablet', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
		->addSelect('vertical_alignment_mobile', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
	->endGroup();

return $valignment;


