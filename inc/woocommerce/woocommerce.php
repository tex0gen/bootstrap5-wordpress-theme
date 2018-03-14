<?php

require_once '_filters.php';
require_once '_removals.php';
require_once '_config.php';


// TODO: Move the following into appropriate files

// ----------------------
// Inject Bootstrap
// ----------------------

// Wraps contents in bootstrap rows
function row_start() {
	echo '<div class="row">';
}

function row_end() {
	echo '</div>';
}

// Gives spacing between sections of content
function section_start() {
	echo '<section class="contain-section">';
}

function section_end() {
	echo '</div><!-- End Section -->';
}

add_action( 'woocommerce_before_shop_loop', 'row_start', 1 );
add_action( 'woocommerce_before_shop_loop', 'row_end', 35 );

// single-product - Wraps row around the product image and product summary
add_action('woocommerce_before_single_product_summary', 'row_start', 10);
add_action('woocommerce_single_product_summary', 'row_end', 80);

// single-product - Wraps section around the product image and product summary
add_action('woocommerce_before_single_product_summary', 'section_start', 8);
add_action('woocommerce_single_product_summary', 'section_end', 82);

// single-product - Wraps section around the related products
add_action('woocommerce_after_single_product_summary', 'section_start', 18);
add_action('woocommerce_after_single_product_summary', 'section_end', 22);


function gravatar_wrap_start() {
    echo '<div class="gravatar-wrap">';
}
function gravatar_wrap_end() {
    echo '</div>';
}
add_action('woocommerce_review_before', 'gravatar_wrap_start', 5);
add_action('woocommerce_review_before', 'gravatar_wrap_end', 15);

// ---- End Bootstrap Injection ---- //