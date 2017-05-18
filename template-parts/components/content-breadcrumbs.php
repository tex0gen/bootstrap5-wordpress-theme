<?php if ( !is_front_page() ) { ?>
	<section class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<div class="breadcrumbs">','</div>');
					}
					?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>