<?php
$main_content_flex = get_field( 'main_content_flex', get_the_ID() );
if ( $main_content_flex ) {
	?>
	<section class="flex flex-scroll-spy">
		<div class="container">
			<div class="d-md-flex justify-content-center">
				<?php
				foreach( $main_content_flex as $key => $row ) {
					if ( isset($row['scrollspy_group']) ) {
						$scrollspy = $row['scrollspy_group'];
						$scrollspy_enabled = $scrollspy['scrollspy'];
						
						if ( $scrollspy_enabled ) {
							// remove non-alphanumeric characters
							$scrollspy_name = strtolower( preg_replace( '/[^a-zA-Z0-9]/', '', $scrollspy['scrollspy_name'] ) );
							echo '<span><a class="btn btn-link" href="#'.strtolower(str_replace(' ', '-', $scrollspy_name)).'">'.$scrollspy['scrollspy_name'].'</a></span>';
						}
					}
				}
				?>
			</div>
		</div>
	</section>
	<?php
}

