<?php
// Change position of the button on "Added to cart" message.
add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
    $titles[] = get_the_title( $product_id );

    $titles = array_filter( $titles );
    $added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );

    $message = sprintf( '%s <a href="%s" class="button">%s</a><div class="clearfix"></div>',
        esc_html( $added_text ),
        esc_url( wc_get_page_permalink( 'cart' ) ),
        esc_html__( 'View Cart', 'woocommerce' ),
        esc_url( wc_get_page_permalink( 'cart' ))
    );

    return $message;
}