<?php
$content_blocks = get_sub_field('content');

if ($content_blocks) {
	?>
	<section class="flex-content-block">
		<div class="container">
			<div class="row">
				<?php
				foreach ($content_blocks as $key => $block) {
					?>
				 	<div class="content col" id="content-block-<?= $key + 1 ?>">
				 		<?php if ( $block['title'] ) { ?>
				 			<h2><?= $block['title'] ?></h2>
				 		<?php } ?>
				 		<?= $block['content_item']; ?>
				 	</div>
					<?php
				 }
				 ?>
			</div>
		</div>
	</section>
	<?php
}