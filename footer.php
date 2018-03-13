		<footer>
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						&copy; <?= date('Y'); ?> - <?= get_bloginfo( 'sitename' ); ?>
					</div>
				</div>
			</div>
		</footer>
		<?php get_template_part( 'template-parts/components/content', 'cookie-policy' ); ?>
		<?php wp_footer(); ?>
	</body>
</html>
