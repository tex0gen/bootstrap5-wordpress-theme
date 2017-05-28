<?php
$slides = get_sub_field('carousel');

if ($slides) {
?>
<div id="slider" class="flex-carousel carousel slide" data-ride="carousel">
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
				<!-- Do overlay content -->
				<div class="carousel-caption d-none d-md-block">
					<p><?= $slide['caption'] ?></p>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<?php if ( $slides['navigation'] === true ) { ?>
		<a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slider" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	<?php } ?>

</div>
<?php } ?>