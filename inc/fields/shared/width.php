<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$width = new FieldsBuilder('width');

$choices = [
	'' => 'Auto',
	['12' => '100%'],
	['9' => '75%'],
	['8' => '66.6%'],
	['6' => '50%'],
	['4' => '33.3%'],
	['3' => '25%'],
	['2' => '16.66667%']
];

$width
	->addGroup('width')
		->addSelect('width_desktop', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
		->addSelect('width_tablet', [
			'choices' => $choices,
			'wrapper' => [
				'width' => '33.33333',
			],
		])
		->addSelect('width_mobile', [
			'choices' => $choices,
			'default_value' => '12',
			'wrapper' => [
				'width' => '33.33333',
			],
		])
	->endGroup();

return $width;


