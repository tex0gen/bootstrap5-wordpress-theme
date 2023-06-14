<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('faqs');
$builder
	->addText('title')
	->addWysiwyg('content')
	->addRepeater('faqs', [
		'button_label' => 'Add FAQ',
		'layout' => 'block',
	])
		->addText('question')
		->addWysiwyg('answer')
	->endRepeater();

return $builder;
