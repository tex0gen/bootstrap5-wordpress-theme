<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$scrollspy = new FieldsBuilder('scrollspy_group');

$scrollspy
	->addGroup('scrollspy_group', [
		'label' => 'Scrollspy',
	])
	->addTrueFalse('scrollspy', [
		'label' => 'Scrollspy',
		'instructions' => 'Enable this section as a scroll to target',
		'default_value' => 0,
	])
	->addText('scrollspy_name', [
		'label' => 'Scrollspy Name',
		'instructions' => 'Enter the name of this section for scrollspy',
		'conditional_logic' => [
			[
				[
					'field' => 'scrollspy',
					'operator' => '==',
					'value' => '1',
				],
			],
		],
	]);


return $scrollspy;
