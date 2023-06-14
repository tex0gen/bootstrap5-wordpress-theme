<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$options_page = new FieldsBuilder('general_options');

$options_page
    ->addTab('Site Options')
    	->addImage('logo', ['return_format' => 'id'])
    ->addTab('Contact Details')
		->addText('telephone_number')
		->addEmail('email_address')
    ->addTab('Social')
		->addRepeater('social', ['layout' => 'table'])
			->addText('social_icon', ['label' => 'Social Icon', 'instructions' => 'Font Awesome Class Name'])
			->addUrl('social_url', ['label' => 'Social URL'])
		->endRepeater()
	->addTab('Site Notice')
		->addGroup('sitewide_notice')
			->addTrueFalse('enable_sitewide_notice')
			->addText('sitewide_notice_text')
			->addLink('sitewide_notice_link')
		->endGroup()
	->addTab('Footer')
		->addGroup('call_to_action')
			->addImage('background_image', ['return_format' => 'id'])
			->addText('title')
			->addWysiwyg('text')
			->addLink('button')
			->addSelect('horizontal_alignment')
				->addChoices('left', 'center', 'right')
			->addSelect('vertical_alignment')
				->addChoices('top', 'center', 'bottom')
			->addSelect('font_colours')
				->addChoices('light', 'dark')
		->endGroup();

$options_page->setLocation('options_page', '==', 'acf-options-theme-options');

add_action('acf/init', function() use ($options_page) {
	$build_fields = $options_page->build();
	acf_add_local_field_group($build_fields);
});
