<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('featured_products');
$builder
	->addText('title')
	->addWysiwyg('text')
	->addNumber('number_of_products');

return $builder;
