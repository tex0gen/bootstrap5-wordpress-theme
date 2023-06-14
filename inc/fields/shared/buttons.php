<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$buttons = new FieldsBuilder('buttons');

$buttons
	->addRepeater('buttons', ['button_label' => 'Add Button'])
		->addLink('button', ['label' => 'Button'])
		->addSelect('button_type', [
			'label' => 'Button Type',
			'choices' => [
				'primary' => 'Primary',
				'secondary' => 'Secondary',
				'link' => 'Link'
			]
		])
		->addSelect('button_size', [
			'label' => 'Button Size',
			'choices' => [
				'xs' => 'Extra Small',
				'sm' => 'Small',
				'md' => 'Normal',
				'lg' => 'Large',
				'xl' => 'Extra Large'
			],
			'default_value' => 'md'
		])
	->endRepeater();

return $buttons;
