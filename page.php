<?php
get_header();

if ( is_woocommerce() || is_cart() || is_checkout() ) {
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php the_title('<h1>','</h1>'); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;
} else {

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php the_title('<h1>','</h1>'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part( 'template-parts/content', 'flex' ); ?>
			<?php
		endwhile;
	endif;
}

get_footer();