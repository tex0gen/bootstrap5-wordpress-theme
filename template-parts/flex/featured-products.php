<?php
$number_posts_field = get_sub_field('number_of_products');
$number_posts = ($number_posts_field) ? $number_posts_field : 5;

$args = array(
	'post_type' => 'product',
	'numberposts' => $number_posts,
	'tax_query'  => array(
        array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
		)
    )
);

$posts = get_posts($args);
$post_count = count($posts);

if ( $posts ) {
?>
<section class="flex-featured-products">
	<div class="container">
		<div class="row">
			<div class="col-12 section-title">
				<h2>Featured Products</h2>
			</div>
		</div>
		<ul class="products row">
			<?php
			foreach ($posts as $key => $post) {
				setup_postdata( $post );

				$id = get_the_id();
				$product = new WC_Product( $id );
				$columns = ($post_count > 6) ? 'col-3':'col';
				?>

				<li class="<?= $columns ?> product">
					<a class="woocommerce-LoopProduct-link" href="<?php the_permalink(); ?>">
					<?= get_the_post_thumbnail( $id, 'large', array('class' => 'img-fluid') ); ?>
					<?php the_title('<h2 class="woocommerce-loop-product__title">', '</h2>'); ?>
					<div class="price">
						<?= $product->get_price_html(); ?>
					</div>
					<?= wc_get_rating_html( $product->get_average_rating() ); ?>
					</a>
					<a class="btn btn-primary" href="<?php the_permalink(); ?>">
						View Product
					</a>
				</li>

				<?php
				wp_reset_postdata();
			}
			?>
		</ul>
	</div>
</section>
<?php } ?>