<?php
$accreditations = get_sub_field('accreditations');
if ($accreditations) {
  ?>
  <section class="flex-accreditations">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3>Accreditations</h3>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div id="accreditations" class="carousel slide" data-ride="carousel">
            <div class="owl-carousel">
              <?php
              foreach ($accreditations as $key => $accr) {
                ?>
                <div class="acarousel-item">
                  <div class="text-center"><?= wp_get_attachment_image( $accr['image']['ID'], 'medium', false, array('class' => 'img-fluid') ); ?></div>
                </div>
                <?php
              }
              ?>
            </div>
            <a class="carousel-control-prev" href="#csc-slider" role="button" data-slide="prev">
              <span><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/l-slider.png" /></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#csc-slider" role="button" data-slide="next">
              <span><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/r-slider.png" /></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
}