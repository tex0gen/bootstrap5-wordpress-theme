<?php
/**
 * Front Page Template
 *
 * The front page (home page) template.
 *
 * @package Themestrap
 * @since 1.0.0
 */

 get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'flex' );
	endwhile;
endif;


get_footer();
