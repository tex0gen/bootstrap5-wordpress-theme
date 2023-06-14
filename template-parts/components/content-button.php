<?php
if ( !$args && !isset( $args['button'] ) ) {
	return;
}

$button = $args['button'];
echo '<a href="' . $button['button']['url'] . '" class="btn btn-' . $button['button_type'] . ' btn-' . $button['button_size'] . '" target="' . $button['button']['target'] . '">' . $button['button']['title'] . '</a>';
