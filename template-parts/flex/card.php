<?php
$cards = get_sub_field('cards');

if ($cards) {
	?>
	<section class="card-wrapper">
		<div class="container">
			<div class="row">
			<?php
			foreach ($cards as $key => $card) {
				?>
				<div class="col">
					<div class="card" id="card-<?= $key + 1 ?>">
						<img class="card-img-top" src="<?= $card['card_image']['sizes']['card']; ?>" alt="<?= $card['card_title']; ?>">
						<div class="card-block">
							<h4 class="card-title"><?= $card['card_title']; ?></h4>
							<div class="card-text"><?= $card['card_content']; ?></div>
							<a href="<?= $card['card_action_link']; ?>" class="btn btn-primary"><?= $card['card_action_text']; ?></a>
						</div>
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
	?>