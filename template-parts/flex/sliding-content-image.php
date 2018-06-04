<?php $slider = get_sub_field('slider'); ?>
<section class="flex-sliding-content-image">
  <div id="sliding-content-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      foreach ($slider as $key => $slide) {
        $active = ($key === 0) ? ' active':'';
        ?>
        <div class="carousel-item<?= $active ?>">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-12 col-md-5">
                <div class="section-content">
                  <h3><?= $slide['title']; ?></h3>
                  <?= $slide['content']; ?>
                </div>
              </div>
              <div class="col-12 col-md-5 offset-md-2 text-center">
                <?= wp_get_attachment_image( $slide['image']['ID'], 'large', false, array('class' => 'img-fluid') ); ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <ol class="carousel-indicators">
      <?php
      foreach ($slider as $key => $slide) {
        $active = ($key === 0) ? 'active':'';
        ?>
        <li data-target="#sliding-content-carousel" data-slide-to="<?= $key ?>" class="<?= $active ?>"></li>
      <?php } ?>
    </ol>
  </div>
</section>