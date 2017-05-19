<?php
get_header();

if ( is_woocommerce() || is_cart() || is_checkout() ) {
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php
						the_title('<h1>', '</h1>');
						the_content();
						?>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;
} else {
	get_template_part( 'template-parts/content', 'flex' );
}

get_footer();