<header class="header-separate">
  <div class="container">
    <div class="row">
      <div class="col-6 col-md-4">
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
      </div>
      <div class="col-6 col-md-4">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-sm sticky-nav">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="collapse navbar-toggleable-xs navbar-collapse" id="navbarSupportedContent">
            <?php
            $args = array(
              'theme_location' => 'main-menu',
              'menu_class' => 'navbar-nav',
              'container' => false
            );

            wp_nav_menu( $args );
            ?>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
