<header class="header-inline">
	<nav class="navbar navbar-expand-sm sticky-nav">
		<div class="container">
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
				<i class="fas fa-bars"></i>
			</button>

			<div class="collapse navbar-toggleable-xs navbar-collapse" id="navbarSupportedContent">
				<?php
				$args = array(
					'theme_location' => 'main-menu',
					'menu_class' => 'navbar-nav ml-auto',
					'container' => false
				);

				wp_nav_menu( $args );
				?>
			</div>
		</div>
	</nav>
</header>
