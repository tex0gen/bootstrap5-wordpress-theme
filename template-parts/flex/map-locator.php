<?php $bg_color = get_sub_field('background_colour'); ?>
<section class="flex-map-locator <?= $bg_color ?>">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title text-center"><?= the_sub_field('title'); ?></h2>
      </div>
    </div>
    <div class="spacer-panel white">
      <div class="row">
        <div class="col-12 col-md-6">
          <?php
          $image = get_sub_field('image');
          echo wp_get_attachment_image( $image['ID'], 'large', false, array('class' => 'img-fluid') );
          ?>
        </div>
        <div class="col-12 col-md-6">
          <?php the_sub_field('text'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="acf-map">
            <?php $location = get_sub_field('location'); ?>
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
              <h4><?php the_sub_field('title'); ?></h4>
              <p class="address"><?php echo $location['address']; ?></p>
              <p><?php the_sub_field('description'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>