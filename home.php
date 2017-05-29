<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/base/content', 'short-post' );
				endwhile;

				?>
				<div class="posts-navigation">
					<p><?php posts_nav_link('&#8734;','&laquo;&laquo; Go Forward In Time','Go Back in Time &raquo;&raquo;'); ?></p>
				</div>
				<?php
			endif;
			?>
		</div>

		<aside class="col-sm-4 sidebar">
			<?php get_sidebar( 'blog-archive' ); ?>
		</aside>
	</div>

</div>

<?php get_footer();