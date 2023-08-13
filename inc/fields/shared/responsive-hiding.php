<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$responsive_hide = new FieldsBuilder('responsive_hiding');

$responsive_hide
	->addGroup('responsive_hiding')
	->addTrueFalse('hide_mobile', [
		'instructions' => 'Hide this section on mobiles',
		'default_value' => 0,
	])
	->addTrueFalse('hide_tablet', [
		'instructions' => 'Hide this section on tablets',
		'default_value' => 0,
	])
	->addTrueFalse('hide_desktop', [
		'instructions' => 'Hide this section on desktops',
		'default_value' => 0,
	]);


return $responsive_hide;
