<?php
$content_blocks = get_sub_field('content');

if ($content_blocks) {
	$bgColor = get_sub_field('background_colour');
	$bgImg = get_sub_field('background_image');
	$classes = get_sub_field('classes');
	?>
	<section class="flex-content-block<?= ($classes) ? ' '.$classes:'' ?><?= ($bgColor) ? ' bg-color':''; ?>" style="<?= ($bgColor) ? ' background-color: '.$bgColor:''; ?><?= ($bgImg) ? ' background-image: url('.$bgImg['sizes']['large'].');':''; ?>">
		<div class="container">
			<div class="row">
				<?php
				foreach ($content_blocks as $key => $block) {
					$width = $block['width'];
					$offset = $block['offset'];
					?>
				 	<div class="content col-12<?= ($width) ? ' col-md-'.$width:' col-md' ?><?= ($offset) ? ' offset-md-'.$offset:'' ?>" id="content-block-<?= $key + 1 ?>">
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