<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4 col-lg-3">
					<div class="sidebar-nav">
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'sidebar-menu',
						) );
						?>
					</div>
				</div>
				<div class="col-12 col-md-8 col-lg-9">
					<div class="main-content">
						<?php get_template_part( 'template-parts/content', 'flex' ); ?>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	endwhile;
endif;


get_footer();