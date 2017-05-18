<html>
	<head>
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


