<?php $imgtext_blocks = get_sub_field('imagetext_blocks'); ?>
<section class="imagetext-block">
	<div class="container">
		<?php
		if ( $imgtext_blocks ) {
			foreach ($imgtext_blocks as $key => $block) {
			?>
				<div class="row imagetext-block-row">
					<div class="col-12 col-sm-6 image-block">
						<img src="<?= $block['image']['sizes']['large'] ?>" class="img-fluid" />
					</div>
					<div class="col-12 col-sm-6 text-block">
						<h2><?= $block['title'] ?></h2>
						<?= $block['text'] ?>
						<?php if ( $block['button_text'] ) { ?>
							<a href="<?= $block['button_link'] ?>" class="btn btn-primary"><?= $block['button_text'] ?></a>
						<?php } ?>
					</div>
				</div>
			<?php
			}
		}
		?>
	</div>
</section>