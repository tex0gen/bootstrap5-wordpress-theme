<?php
$scrollspy = get_sub_field('scrollspy_group');
$scrollspy_enabled = $scrollspy['scrollspy'];
$scrollspy_name = strtolower( preg_replace( '/[^a-zA-Z0-9]/', '', $scrollspy['scrollspy_name'] ) );

$slides = get_sub_field('slides');
$title = get_sub_field('title');

if ( $slides ) {
	?>
	<section class="flex-content-slider <?= $style ?>"<?= ($scrollspy) ? ' id="'.str_replace(' ', '-', $scrollspy_name).'"':null; ?>>
		<?php if ( $title ) { ?>
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<h2 class="flex-content-slider__title"><?= $title ?></h2>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="swiper">
			<div class="swiper-wrapper">
				<?php
				foreach ( $slides as $key => $slide ) {
					$swap = $slide['swap_position'];
					if ( $swap ) {
						$class_1 = " order-lg-2 slide-right";
						$class_2 = " order-lg-1 slide-left";
					} else {
						$class_1 = " order-lg-1 slide-left";
						$class_2 = " order-lg-2 slide-right";
					}
					?>
					<div class="swiper-slide">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-12 col-lg-6 order-2 px-2 <?= $class_1 ?>">
									<div class="flex-content-slider__content">
										<?= $slide['content']; ?>
									</div>
								</div>
								<div class="col-12 col-lg-6 order-1 px-2 <?= $class_2 ?> text-center mb-4 mb-md-0">
									<div class="flex-content-slider__image">
										<?= wp_get_attachment_image( $slide['image'], 'full-width', false, array('class' => 'img-fluid') ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
			<!-- If we need navigation buttons -->
			<a href="#" class="swiper-button-prev">Prev</a>
			<a href="#" class="swiper-button-next">Next</a>
		</div>
	</section>
	<?php
}
?>
