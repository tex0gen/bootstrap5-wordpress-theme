<?php
$slides = get_sub_field('carousel');

if ($slides) {
?>
<section id="slider" class="flex-carousel">
	<div class="owl-carousel">
		<?php
		foreach ($slides as $key => $slide) {
			?>
			<div class="has-desktop <?= ($slide['mobile_image']['ID']) ? 'has-mobile':'no-mobile'; ?>">
				<a href="<?= $slide['buttons'][0]['button_link'] ?>" class="fill-link overlay-color"></a>
				<?= wp_get_attachment_image( $slide['image']['ID'], 'full-width', false, array('class' => 'img-fluid desktop-img') ); ?>
				<?= wp_get_attachment_image( $slide['mobile_image']['ID'], 'large', false, array('class' => 'img-fluid mobile-img') ); ?>
				<div class="carousel-text">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-12 col-md-6">
								<?php
								if ($slide['title']) {
									echo '<h1>'.$slide['title'].'</h1>';
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
			</div>
			<?php
		}
		?>
	</div>
</section>
<?php
}
