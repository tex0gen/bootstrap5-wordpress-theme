<footer>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4">
        <h3>Column 1</h3>
      </div>
      <div class="col-12 col-md-4">
        <h3>Column 2</h3>
      </div>
      <div class="col-12 col-md-4">
        <h3>Social</h3>
        <?php do_social(); ?>
      </div>
    </div>
  </div>

  <div class="socket">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <?php the_field('copyright_text', 'options'); ?>
          &copy; <?= date('Y'); ?> - <?= get_bloginfo( 'sitename' ); ?>
        </div>
      </div>
    </div>
  </div>
</footer>