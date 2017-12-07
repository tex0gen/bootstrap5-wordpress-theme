<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?= wp_title() ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?= body_class(); ?>>

		<?php
		// Include Header
		get_template_part( 'template-parts/base/content', 'header' );
		?>

		<?php
		// Include breadcrumb
		get_template_part( 'template-parts/components/content', 'breadcrumbs' );
		?>


