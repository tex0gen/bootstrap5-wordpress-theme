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

// Wraps contents in bootstrap rows
function row_start() {
	echo '<div class="row">';
}

function row_end() {
	echo '</div><!-- End Row -->';
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

// single-product - Wraps row around the product image and product summary
add_action('woocommerce_before_single_product_summary', 'section_start', 8);
add_action('woocommerce_single_product_summary', 'section_end', 82);


function gravatar_wrap_start() {
    echo '<div class="gravatar-wrap">';
}
function gravatar_wrap_end() {
    echo '</div>';
}
add_action('woocommerce_review_before', 'gravatar_wrap_start', 5);
add_action('woocommerce_review_before', 'gravatar_wrap_end', 15);

// ---- End Bootstrap Injection ---- //


add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
    $titles[] = get_the_title( $product_id );

    $titles = array_filter( $titles );
    $added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );

    $message = sprintf( '%s <a href="%s" class="button">%s</a><div class="clearfix"></div>',
                    esc_html( $added_text ),
                    esc_url( wc_get_page_permalink( 'cart' ) ),
                    esc_html__( 'View Cart', 'woocommerce' ),
                    esc_url( wc_get_page_permalink( 'cart' )));

    return $message;
}