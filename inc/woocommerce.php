<?php


// ----------------------
// Begin Removal Business
// ----------------------

// Remove woocommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Remove woocommerce breadcrumb
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// Remove woocommerce sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Remove woocommerce sale message above image (single-product)
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// ---- End Removal Business ---- //




// ----------------------
// Inject Bootstrap
// ----------------------
function row_start() {
	echo '<div class="row">';
}

function row_end() {
	echo '</div><!-- End Row -->';
}

add_action( 'woocommerce_before_shop_loop', 'row_start', 1 );
add_action( 'woocommerce_before_shop_loop', 'row_end', 35 );

add_action('woocommerce_before_single_product_summary', 'row_start', 10);
add_action('woocommerce_single_product_summary', 'row_end', 80);



// ---- End Bootstrap Injection ---- //

