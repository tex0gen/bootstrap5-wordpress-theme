<?php
$slides = get_sub_field('carousel');

if ($slides) {
	$opts = array(
		'slideTransition' => get_sub_field('transition'),
		'autoplayTimeout' => get_sub_field('speed'),
		'loop' => get_sub_field('loop'),
		'items' => get_sub_field('number_to_show'),
		'nav' => get_sub_field('indicators'),
		'dots' => get_sub_field('navigation'),
		'indicators' => get_sub_field('indicators')
	);
?>
<section class="flex-carousel">
	<div class="owl-carousel" data-carousel-options='<?= json_encode($opts) ?>'>
		<?php
		foreach ($slides as $key => $slide) {
			?>
			<div class="has-desktop <?= ($slide['mobile_image']['ID']) ? 'has-mobile':'no-mobile'; ?>">
				<?= wp_get_attachment_image( $slide['image']['ID'], 'full-width', false, array('class' => 'img-fluid desktop-img') ); ?>
				<?= wp_get_attachment_image( $slide['mobile_image']['ID'], 'large', false, array('class' => 'img-fluid mobile-img') ); ?>
				
				<?php if (get_sub_field('call_to_action')) { ?>
				<div class="carousel-text">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-12 col-md-6">
								<?php
								if ($slide['title']) {
									echo '<h2>'.$slide['title'].'</h2>';
								}

								if ($slide['title']) {
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
