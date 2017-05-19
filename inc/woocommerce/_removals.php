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
// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// ---- End Removal Business ---- //