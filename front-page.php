<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'flex' );
		?>
		<i class="fa fa-chevron-left"></i>
		<?php
	endwhile;
endif;


get_footer();