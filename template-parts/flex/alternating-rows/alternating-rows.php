<?php
$scrollspy = get_sub_field('scrollspy_group');
if ( $scrollspy ) {
	$scrollspy_enabled = $scrollspy['scrollspy'];
	$scrollspy_name = strtolower( preg_replace( '/[^a-zA-Z0-9]/', '', $scrollspy['scrollspy_name'] ) );
}

$alt_rows = get_sub_field('rows');

if ($alt_rows) {
	$cutouts = get_sub_field('cutouts');
	$animate = get_sub_field('animate');
	?>
	<section class="flex-alternating"<?= ($scrollspy) ? ' id="'.str_replace(' ', '-', $scrollspy_name).'"':null; ?>>
		<div class="container">
			<?php if (get_sub_field('title')) { ?>
				<div class="row justify-content-center">
					<div class="col-12 col-md-9 text-center">
						<h2><?= the_sub_field('title'); ?></h2>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php
		foreach( $alt_rows as $key => $row ) {
			$bgColor = $row['background_colour'];
			$swap = $row['swap_positions'];
			// var_dump($swap);

			if ($key % 2 == 1 || $swap) {
				$class = " img-right order-lg-1";
				$text_class = ' text-left';
			} else {
				$class = " img-left";
				$text_class = ' text-right';
			}
			?>
			<div class="flex-alternating-item<?= ($animate) ? ' animate':null; ?><?= ($cutouts) ? ' cutouts':null; ?><?= ($bgColor) ? ' bg-color':''; ?><?= $text_class ?>" <?= ($bgColor) ? 'style="background-color: '.$bgColor.'"':''; ?>>
				<div class="container-fluid">
					<div class="row align-items-xl-center">
						<div class="col-12 p-lg-0 col-lg-6<?= $class ?>">
							<?= wp_get_attachment_image( $row['image'], 'alt-rows', false, array('class' => 'alt-row-image mb-0') ); ?>
						</div>
						<div class="col-12 p-lg-0 col-lg-6">
							<div class="flex-alternating__text">
								<?= ( $row['heading'] ) ? '<h2>' . $row['heading'] . '</h2>':null; ?>
								<?= $row['text'] ?>
								<?php if ( $row['buttons'] ) { ?>
									<div class="flex-alternating__buttons">
										<?php
										foreach( $row['buttons'] as $button ) {
											get_template_part( 'template-parts/components/content', 'button', array('button' => $button) );
										}
										?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</section>
	<?php
}
