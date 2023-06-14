<?php
$faqs = get_sub_field('faqs');
$title = get_sub_field('title');
$text = get_sub_field('content');

if ( $faqs ) {
	?>
	<section class="flex flex-faqs">
		<?php
		if ( $title || $text ) {
			?>
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<?php if ( $title ) { ?>
							<h2><?= $title ?></h2>
						<?php } ?>
						<?php if ( $text ) { ?>
							<div class="mb-5"><?= $text ?></div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php
		}
		?>

		<div class="container">
			<div class="row">
				<?php
				foreach ( $faqs as $key => $faq ) {
					?>
					<div class="col-12 flex-faqs--item">
						<div class="flex-faqs--wrapper">
							<button class="flex-faqs--title"><?= $faq['question'] ?></button>
							<div class="flex-faqs--content"><?= $faq['answer'] ?></div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
