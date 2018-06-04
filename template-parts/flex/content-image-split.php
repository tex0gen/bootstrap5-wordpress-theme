<?php
$bg_colour = get_sub_field('background_colour');
$section_title = get_sub_field('title');
$section_img = get_sub_field('image');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
?>
<section class="flex-content-image-split <?= $bg_colour ?>">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <?php if ( $section_title ) { ?>
          <h2 class="section-title"><?= $section_title ?></h2>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-5">
        <div class="section-content">
          <?php the_sub_field('content'); ?>
        </div>
        <?php
        if ($button_text && $button_link) {
          ?>
          <a href="<?= $button_link ?>" class="btn btn-primary">
            <?= $button_text ?>
          </a>
          <?php
        }
        ?>
      </div>
      <div class="col-12 col-md-2 d-none d-md-block"></div>
      <div class="col-12 col-md-5 section-image">
        <?= wp_get_attachment_image( $section_img['ID'], 'large', false, array('class' => 'img-fluid') ); ?>
      </div>
    </div>
  </div>
</section>