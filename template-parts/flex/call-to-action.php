<?php $bg_image = get_sub_field('background_image'); ?>
<section class="flex-call-to-action" style="background-image:url('<?= $bg_image['sizes']['full-width']; ?>');">
	<div class="container">
		<div class="row">

			<?php
			$align = get_sub_field('alignment');
			switch ($align) {
				case 'center':
					$alignment = ' text-center offset-sm-2';
					break;
				case 'right':
					$alignment = ' text-right offset-sm-4';
					break;
				
				default:
					$alignment = '';
					break;
			}
			?>

			<div class="col-12 col-sm-8<?= $alignment ?>">
				<h1><?php the_sub_field('title'); ?></h1>
				<div class="">
					<?php the_sub_field('content'); ?>
				</div>
				<?php if (get_sub_field('button_link')) { ?>
				<div class="button-wrapper">
					<a class="btn btn-primary" href="<?php the_sub_field('button_link'); ?>">
						<?php the_sub_field('button_text'); ?>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>