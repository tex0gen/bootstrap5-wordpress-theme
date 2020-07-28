<?php
$slides = get_sub_field('carousel');

if ($slides) {
	$carousel_type = get_sub_field('type');
	$showcase = ($carousel_type === 'showcase') ? true:false;
	$opts = array(
		'animateOut' => (get_sub_field('transition') === 'linear') ? false:get_sub_field('transition'),
		'autoplayTimeout' => get_sub_field('speed'),
		'loop' => get_sub_field('loop'),
		'items' => ($showcase) ? 3:(int)get_sub_field('number_to_show'),
		'nav' => get_sub_field('indicators'),
		'dots' => get_sub_field('navigation'),
		'center' => $showcase,
	);
?>
<section class="flex-carousel<?= ($carousel_type) ? ' '.$carousel_type:''; ?>">
	<div class="owl-carousel" data-carousel-options='<?= json_encode($opts) ?>'>
		<?php
		foreach ($slides as $key => $slide) {
			?>
			<div class="has-desktop<?= ($slide['mobile_image']['ID']) ? ' has-mobile':''; ?>">
				<?= wp_get_attachment_image( $slide['background_image']['ID'], 'full-width', false, array('class' => 'img-fluid desktop-img') ); ?>
				<?= wp_get_attachment_image( $slide['mobile_image']['ID'], 'large', false, array('class' => 'img-fluid mobile-img') ); ?>
				
				<?php
				if ($carousel_type === 'cta') {
					$foreground_image = $slide['foreground_image'];
					$alignment = $slide['alignment'];
					switch ($alignment) {
						case 'left':
							$textalign = '';
							break;
						case 'center':
							$textalign = ' offset-md-3';
							break;
						case 'right':
							$textalign = ($foreground_image) ? ' order-md-1':' offset-md-6';
							break;
						default:
							$textalign = '';
							break;
					}
					?>
					<div class="carousel-text">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-12 col-md-6<?= $textalign ?>">
									<?php
									if ($slide['text']) {
										echo $slide['text'];
									}
									?>
									
									<div class="carousel-buttons">
										<?php
										if ( $slide['buttons'] ) {
											foreach ( $slide['buttons'] as $btnkey => $button ) {
												echo '<a href="' . $button['button_link'] . '" class="btn btn-primary btn-lg button' . ($btnkey + 1) . '">'.$button['button_text'].'</a>';
											}
										}
										?>
									</div>
								</div>
								<?php if ($foreground_image) { ?>
									<div class="col-12 col-md-6">
										<?= wp_get_attachment_image( $foreground_image, 'large', false, array('class' => 'img-fluid') ); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php
		}
		?>
	</div>
</section>
<?php
}
