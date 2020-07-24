<?php
$content_blocks = get_sub_field('content');

if ($content_blocks) {
	$bgColor = get_sub_field('background_colour');
	?>
	<section class="flex-content-block"<?= ($bgColor) ? ' style="background-color: '.$bgColor.'"':''; ?>>
		<div class="container">
			<div class="row">
				<?php
				foreach ($content_blocks as $key => $block) {
					$width = $block['width'];
					$offset = $block['offset'];
					$classes = $block['classes'];
					?>
				 	<div class="content<?= ($classes) ? ' '.$classes:'' ?> col-12<?= ($width) ? ' col-md-'.$width:'col' ?><?= ($offset) ? ' offset-md-'.$offset:'' ?>" id="content-block-<?= $key + 1 ?>">
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