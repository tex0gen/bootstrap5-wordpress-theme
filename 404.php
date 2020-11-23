<?php
/**
 * 404 Template
 *
 * The 404 page template.
 *
 * @package Themestrap
 * @since 1.0.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-12 contain-section">
			<h1>Error 404 - Page Not Found</h1>
			<p>Sorry, the page you have requested has been moved or deleted. <a href="<?php _e( get_bloginfo( 'url' ) ); ?>">Click here</a> to be taken back to the home page.</p>
		</div>
	</div>
</div>
<?php get_footer();
