		<footer>
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-4">
						<h3>Column 1</h3>
					</div>
					<div class="col-12 col-md-4">
						<h3>Column 2</h3>
					</div>
					<div class="col-12 col-md-4">
						<h3>Social</h3>
						<?php do_social(); ?>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<?php the_field('copyright_text', 'options'); ?>
						&copy; <?= date('Y'); ?> - <?= get_bloginfo( 'sitename' ); ?>
					</div>
				</div>
			</div>
		</footer>
		<?php get_template_part( 'template-parts/components/content', 'cookie-policy' ); ?>
		<?php wp_footer(); ?>
	</body>
</html>
