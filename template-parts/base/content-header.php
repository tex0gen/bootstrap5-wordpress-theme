<header>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<a class="navbar-brand" href="<?= get_bloginfo('url'); ?>">
					<?php
					$logo = get_field('logo', 'options');
					
					if ( $logo ) {
						echo '<img src="'.$logo['sizes']['large'].'" alt="'.get_bloginfo('name').'" class="img-fluid"/>';
					} else {
						echo get_bloginfo('name');
					}
					?>
				</a>

				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			</div>
		</div>
	</div>
</header>

<div class="container">
	<nav class="navbar navbar-expand-sm nav-fill w-100">
		<div class="collapse navbar-toggleable-xs navbar-collapse" id="navbarSupportedContent">
			<?php
			$args = array(
				'theme_location' => 'main-menu',
				'menu_class' => 'nav navbar-nav nav-fill w-100',
				'container' => false
			);

			wp_nav_menu( $args );
			?>
		</div>
	</nav>
</div>