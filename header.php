<?php
/**
 * Header Template
 *
 * The header template.
 *
 * @package Themestrap
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?= wp_title() ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?= body_class(); ?>>
		<?php
		// Include Header
		// get_template_part( 'template-parts/base/headers/content', 'header-inline' );
		get_template_part( 'template-parts/base/headers/content', 'header-separate' );
		?>

		<?php
		// Include breadcrumb
		get_template_part( 'template-parts/components/content', 'breadcrumbs' );
		?>


