<?php
$slides = get_sub_field('carousel');

if ($slides) {
?>
<section id="flex-slider" class="flex-carousel carousel slide" data-ride="carousel">
	<?php if ( $slides['indicators'] ) { ?>
		<ol class="carousel-indicators">
			<?php
			foreach ($slides as $key => $slide) {
				?>
				<li data-target="#slider" data-slide-to="<?= $key ?>" class="<?= ($key === 1) ? 'active':''; ?>"></li>
				<?php
			}
			?>
		</ol>
	<?php } ?>

	<div class="carousel-inner" role="listbox">
		<?php
		foreach ($slides as $key => $slide) {
			?>
			<div class="carousel-item<?= ($key === 0) ? ' active':''; ?>" style="background-image:url('<?= $slide['image']['sizes']['full-width']; ?>');">
				<?php if ( get_sub_field('call_to_action') === true ) { ?>
					<div class="container">
						<div class="row">
							<?php
							$alignment = $slide['alignment'];

							switch ($alignment) {
								case 'center':
									$align = 'offset-sm-2 text-center';
									break;

								case 'right':
									$align = 'offset-sm-4 text-right';
									break;
								
								default:
									$align = '';
									break;
							}


							?>
							<div class="col-12 col-sm-8 <?= $align ?>">
								<?= ( $slide['title'] ) ? '<h2>' . $slide['title'] . '</h2>':''; ?>
								<?= ( $slide['text'] ) ? $slide['text']:''; ?>
								<?php
								if ( $slide['buttons'] ) {
									foreach ( $slide['buttons'] as $btnkey => $button ) {
										echo '<a href="' . $button['button_link'] . '" class="btn btn-primary button' . ($btnkey + 1) . '">'.$button['button_text'].'</a>';
									}
								}
								?>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="carousel-caption d-none d-md-block">
						<p><?= $slide['caption'] ?></p>
					</div>
				<?php } ?>
			</div>
			<?php
		}
		?>
	</div>

	<?php if ( $slides['navigation'] ) { ?>
		<a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slider" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	<?php } ?>

</section>
<?php } ?>
