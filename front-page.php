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
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<?php the_title('<h1>', '</h1>'); ?>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php
	endwhile;
endif;


get_footer();