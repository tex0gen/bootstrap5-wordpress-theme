<?php
/**
 * Yoast SEO Breadcrumb Template Part
 *
 * This template part checks Yoast SEO is installed and activates the breadcrumb if switched on in settings.
 *
 * @package Themestrap
 * @since 1.0.0
 */

if ( !is_front_page() && function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<section class="breadcrumb"><div class="container"><div class="row"><div class="col-12"><div class="breadcrumbs">','</div></div></div></div></section>');
}