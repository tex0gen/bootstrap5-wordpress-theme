<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('scroll_spy');

$builder->addMessage('Scroll Spy Instructions', 'This section will be used as a scroll to a target. Place this block where you want your navigational element to appear. Then on each individual block you want to be a target, add a name to the "scroll spy" section of the block settings.', []);

return $builder;
