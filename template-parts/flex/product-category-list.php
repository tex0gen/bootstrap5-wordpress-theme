<?php if ( class_exists( 'WooCommerce' ) ) { ?>
<section class="flex-product-category-list">
	<div class="container">
		<div class="row grid">
			<?php
			$terms = get_terms( 'product_cat', array('hide_empty' => false) );

			if ( $terms ) {
				foreach( $terms as $key => $term ) {
					$term_image = get_field('category_image', 'product_cat_' . $term->term_id);

					$class = ($key % 6 === 0) ? 'col-6 col-sm-8':'col-6 col-sm-4';
					?>
					<div class="<?= $class ?> grid-item">
						<div class="term-item" style="background-image:url('<?= $term_image['sizes']['large'] ?>');">
							<a href="<?= get_term_link( $term->term_id, 'product_cat' ); ?>" class="overlay"></a>
							<h3><?= $term->name; ?></h3>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>
<?php } ?>