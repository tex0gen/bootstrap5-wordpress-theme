<header>
	<nav class="navbar navbar-expand-sm">
		<div class="container">
			<a class="navbar-brand" href="#">
				<?php
				$logo = get_field('logo', 'options');
				if ( $logo ) {
					echo $logo['sizes']['large'];
				} else {
					get_bloginfo('name');
				}
				?>
			</a>

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
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