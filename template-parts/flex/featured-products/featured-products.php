<?php
$number_posts_field = get_sub_field('number_of_products');
$number_posts = ( $number_posts_field ) ? $number_posts_field : 5;
$title = get_sub_field( 'title' );
$text = get_sub_field( 'text' );

$args = array(
	'post_type'   => 'product',
	'numberposts' => $number_posts,
	'tax_query'   => array(
	array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
		)
	)
);

$featured_products = get_posts( $args );

if ( $featured_products ) {
	?>
	<section class="flex-featured-products">
		<div class="container">
			<?php if ( $title ) { ?>
				<div class="row">
					<div class="col-12 section-title">
						<h2><?= $title ?></h2>
						<?= $text ?>
					</div>
				</div>
			<?php } ?>
			<ul class="products row">
				<?php
				foreach ( $featured_products as $key => $post ) {
					setup_postdata( $post );
					wc_get_template_part( 'content', 'product' );
					wp_reset_postdata();
				}
				?>
			</ul>
		</div>
	</section>
	<?php
}
