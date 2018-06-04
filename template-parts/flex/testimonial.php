<?php
$generate_random = rand(0, 5000);
$bg_img = get_sub_field('testimonial_image');
$padding = ($bg_img) ? '':' nopadding';
$testimonial_id = get_sub_field('testimonial');
$bg_colour = get_sub_field('background_colour');
$quotes = (get_sub_field('remove_quotes')) ? '':' quotes';
$small = (get_sub_field('small_version')) ? ' small':'';
$slider = get_sub_field('slide');
$testimonials = get_sub_field('testimonials');
?>
<section class="flex-testimonial <?= $bg_colour ?><?= $quotes ?><?= $small ?><?= $padding ?>" style="background-image: url('<?= $bg_img['sizes']['full-width']; ?>');">
  <?php if ($bg_img) { ?><div class="overlay overlay-dark"></div><?php } ?>

  <?php
  if ($slider !== true) {
    ?>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="testimonial-text">
            <?= rsi_get_content($testimonial_id); ?>
          </div>
          <div class="testimonial-person">
            <?= get_the_title( $testimonial_id ); ?>
          </div>
        </div>
      </div>
    </div>
    <?php } else { ?>
      <div id="slider-<?= $generate_random ?>" class="carousel-testimonials carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
        <?php
        if ($testimonials) {
          foreach ($testimonials as $key => $slide) {
            ?>
            <div class="carousel-item<?= ($key === 0) ? ' active':''; ?>" >
              <div class="container">
                <div class="row">
                  <div class="col-12 text-center">
                    <div class="testimonial-text">
                      <?= rsi_get_content( $slide['testimonial']->ID ); ?>
                    </div>
                    <div class="testimonial-person">
                      <?= get_the_title( $slide['testimonial']->ID ); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>

      <ol class="carousel-indicators">
        <?php
        if ($testimonials) {
          foreach ($testimonials as $key => $slide) {
          $active = ($key === 0) ? 'active':'';
          ?>
          <li data-target="#slider-<?= $generate_random ?>" data-slide-to="<?= $key ?>" class="<?= $active ?>"></li>
          <?php }
        }
        ?>
      </ol>
    </div>
  <?php } ?>
</section>