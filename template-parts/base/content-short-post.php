<div class="row post-item">
	<div class="col-12 col-md-4">
		<a href="<?= the_permalink(); ?>">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid' ) ); ?>
		</a>
	</div>
	<div class="col-12 col-md-8">
		<h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			Posted on <?php the_date(); ?> by <?= the_author_posts_link() ?>
		</div>
		<?php the_excerpt(); ?>
		<a href="<?= the_permalink(); ?>" class="btn btn-primary">Read More</a>
	</div>
	<hr/>
</div>