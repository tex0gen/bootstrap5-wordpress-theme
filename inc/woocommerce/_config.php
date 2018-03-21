<?php
/*
* Do a sidebar if selected in options
*/
if ( get_field( 'woocommerce_sidebar', 'options' ) === true ) {
	function woo_archive_sidebar() {
		?>
		<div class="row">
		<aside class="col-sm-4 sidebar-wrap">
			<?php get_sidebar('woocommerce-archive'); ?>
		</aside>
		<div class="col-sm-8 product-wrap">
		<?php
	}

	add_action( 'woocommerce_before_shop_loop', 'woo_archive_sidebar', 38 );

	// End Product Wrap
	add_action( 'woocommerce_after_shop_loop', 'row_end', 5 );

	// End Row
	add_action( 'woocommerce_after_shop_loop', 'row_end', 6 );
}