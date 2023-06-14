<?php
$scrollspy = get_sub_field('scrollspy_group');
$scrollspy_enabled = $scrollspy['scrollspy'];
$scrollspy_name = strtolower( preg_replace( '/[^a-zA-Z0-9]/', '', $scrollspy['scrollspy_name'] ) );

$content_blocks = get_sub_field( 'content' );

if ($content_blocks) {
	$bgColor = get_sub_field( 'background_colour' );
	$bgImg = get_sub_field( 'background_image' );
	$classes = get_sub_field( 'classes' );
	$overlay = get_sub_field( 'overlay' );
	$alignment = get_sub_field('alignment');

	$align = (isset($alignment['alignment_mobile'])) ? ' justify-content-'.$alignment['alignment_mobile']:'';
	$align .= (isset($alignment['alignment_tablet'])) ? ' justify-content-sm-'.$alignment['alignment_tablet']:'';
	$align .= (isset($alignment['alignment_desktop'])) ? 'justify-content-md-'.$alignment['alignment_desktop']:'';
	
	?>
	<section class="flex-content-block<?= ($classes) ? ' '.$classes:'' ?><?= ($bgColor) ? ' bg-color':''; ?><?= ($bgImg) ? ' bg-img':''; ?><?= ($overlay) ? ' o-'.$overlay:''; ?>" style="<?= ($bgColor) ? ' background-color: '.$bgColor:''; ?><?= ($bgImg) ? ' background-image: url('.$bgImg['url'].');':''; ?>"<?= ($scrollspy) ? ' id="'.str_replace(' ', '-', $scrollspy_name).'"':null; ?>>
		<div class="container">
			<div class="row justify-content-<?= $align ?>">
				<?php
				foreach ( $content_blocks as $key => $block ) {
					$widths = $block['width'];

					$width = (isset($widths['width_mobile'])) ? 'col-'.$widths['width_mobile']:'';
					$width .= (isset($widths['width_tablet'])) ? ' col-sm-'.$widths['width_tablet']:'';
					$width .= (isset($widths['width_desktop'])) ? ' col-md-'.$widths['width_desktop']:'';

					$buttons = $block['buttons'];
					?>
				 	<div class="content col-12<?= $width ?>">
				 		<?= ($block['title']) ? '<'.$block['title_type'].' class="content-block-title">'.$block['title'].'</'.$block['title_type'].'>':null; ?>
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
