<?php
use StoutLogic\AcfBuilder\FieldsBuilder;
$latest_posts = new FieldsBuilder('latest_posts');
$latest_posts
	->addText('title')
	->addNumber('number_posts');

return $latest_posts;
