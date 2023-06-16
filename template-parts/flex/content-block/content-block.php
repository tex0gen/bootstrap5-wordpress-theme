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
	$valignment = get_sub_field('vertical_alignment');

	$bgImg = ($bgImg) ? wp_get_attachment_url( $bgImg, 'large', false ):null;

	// Horizontal Alignment
	$align = (
		isset($alignment['alignment_mobile'])
		&& $alignment['alignment_mobile'] !== ""
	) ? ' justify-content-'.$alignment['alignment_mobile']:'';
	$align .= (
		isset($alignment['alignment_tablet'])
		&& $alignment['alignment_tablet'] !== ""
	) ? ' justify-content-sm-'.$alignment['alignment_tablet']:'';
	$align .= (
		isset($alignment['alignment_desktop'])
		&& $alignment['alignment_desktop'] !== ""
	) ? ' justify-content-md-'.$alignment['alignment_desktop']:'';

	// Vertical Alignment
	$valign = (
		isset($valignment['vertical_alignment_mobile'])
		&& $valignment['vertical_alignment_mobile'] !== ""
	) ? ' align-items-'.$valignment['vertical_alignment_mobile']:'';
	$valign .= (
		isset($valignment['vertical_alignment_tablet'])
		&& $valignment['vertical_alignment_tablet'] !== ""
	) ? ' align-items-sm-'.$valignment['vertical_alignment_tablet']:'';
	$valign .= (
		isset($valignment['vertical_alignment_desktop'])
		&& $valignment['vertical_alignment_desktop'] !== ""
	) ? ' align-items-md-'.$valignment['vertical_alignment_desktop']:'';
	
	?>
	<section class="flex-content-block<?= ($classes) ? ' '.$classes:'' ?><?= ($bgColor) ? ' bg-color':''; ?><?= ($bgImg) ? ' bg-img':''; ?><?= ($overlay) ? ' overlay-'.$overlay:''; ?>" style="<?= ($bgColor) ? ' background-color: '.$bgColor:''; ?><?= ($bgImg) ? ' background-image: url('.$bgImg.');':''; ?>"<?= ($scrollspy) ? ' id="'.str_replace(' ', '-', $scrollspy_name).'"':null; ?>>
		<div class="container">
			<div class="row<?= $align ?><?= $valign ?>">
				<?php
				foreach ( $content_blocks as $key => $block ) {
					$content_type = $block['content_type'];
					$widths = $block['width'];

					$width = (isset($widths['width_mobile']) && $widths['width_mobile'] !== "" ) ? ' col-'.$widths['width_mobile']:' col-12';
					$width .= (isset($widths['width_tablet']) && $widths['width_tablet'] !== "" ) ? ' col-sm-'.$widths['width_tablet']:' col-sm';
					$width .= (isset($widths['width_desktop']) && $widths['width_desktop'] !== "" ) ? ' col-md-'.$widths['width_desktop']:' col-md';

					$buttons = $block['buttons'];
					?>
				 	<div class="content<?= $width ?>">
						<?php
						if ( $content_type === 'wysiwyg' ) {
							echo ($block['title']) ? '<'.$block['title_type'].' class="content-block-title">'.$block['title'].'</'.$block['title_type'].'>':null;
							echo $block['content_item'];
						} else if ( $content_type === 'image' ) {
							$cutout = $block['image_cutout'];
							echo '<div class="content-block--image cutout-'.$cutout.'">';
							if ( $cutout === 'circle' ) {
								$size = 'squared';
							} else {
								$size = 'large';
							}
							echo wp_get_attachment_image( $block['image'], $size, false, array('class'=>'img-fluid') );
							echo '</div>';
						} else if ( $content === 'video' ) {
							echo '<div class="content-block--video">';
							echo $block['video_embed'];
							echo '</div>';
						}

						if ( $buttons ) {
							$btn_align = $block['button_alignment'];
							echo '<div class="flex-content-block-buttons text-'.$btn_align.'">';
							foreach ( $buttons as $key => $button ) {
								$target = ($button['button']['target']) ? 'target="'.$button['button']['target'].'" rel="noopener"':'';
								echo '<a href="'.$button['button']['url'].'" class="btn btn-'.$button['button_type'].' btn-'.$button['button_size'].'"'.$target.'>'.$button['button']['title'].'</a>';
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
