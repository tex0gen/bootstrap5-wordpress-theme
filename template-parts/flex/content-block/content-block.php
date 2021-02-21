<?php
$content_blocks = get_sub_field( 'content' );

if ($content_blocks) {
	$bgColor = get_sub_field( 'background_colour' );
	$bgImg = get_sub_field( 'background_image' );
	$classes = get_sub_field( 'classes' );
	$overlay = get_sub_field( 'overlay' );
	?>
	<section class="flex-content-block<?= ($classes) ? ' '.$classes:'' ?><?= ($bgColor) ? ' bg-color':''; ?><?= ($bgImg) ? ' bg-img':''; ?><?= ($overlay) ? ' o-'.$overlay:''; ?>" style="<?= ($bgColor) ? ' background-color: '.$bgColor:''; ?><?= ($bgImg) ? ' background-image: url('.$bgImg['url'].');':''; ?>">
		<div class="container">
			<div class="row">
				<?php
				foreach ( $content_blocks as $key => $block ) {
					$width = $block['width'];
					$offset = $block['offset'];
					$buttons = $block['buttons'];
					?>
				 	<div class="content col-12<?= ($width) ? ' col-md-'.$width:' col-md' ?><?= ($offset) ? ' offset-md-'.$offset:'' ?>" id="content-block-<?= $key + 1 ?>">
				 		<?= $block['content_item']; ?>
						<?php
						if ( $buttons ) {
							$btn_align = $block['button_alignment'];
							echo '<div class="flex-content-block-buttons text-'.$btn_align.'">';
							foreach ( $buttons as $key => $button ) {
								$target = ($button['button_link']['target']) ? 'target="'.$button['button_link']['target'].'" rel="noopener"':'';
								echo '<a href="'.$button['button_link']['url'].'" class="btn btn-'.$button['button_type'].' btn-'.$button['button_size'].'"'.$target.'>'.$button['button_link']['title'].'</a>';
							}
							echo '</div>';
						}
						?>
				 	</div>
					<?php
				 }
				 ?>
			</div>
		</div>
	</section>
	<?php
}
