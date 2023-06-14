<?php
$logos = get_sub_field('logos');
if ($logos) {
	?>
	<section class="flex-logos">
		<div class="container">
			<div class="row align-items-center">
				<?php
				foreach ($logos as $key => $logo) {
					?>
					<div class="col-6 col-md text-center">
						<?php if ($logo['link']) { ?><a href="<?= $logo['link'] ?>"><?php } ?>
						<?= wp_get_attachment_image( $logo['image'], 'medium', false, array('class' => 'img-fluid') ); ?>
						<?php if ($logo['link']) { ?></a><?php } ?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
