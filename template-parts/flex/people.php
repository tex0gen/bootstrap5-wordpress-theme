<?php
$bg_color = get_sub_field('background_colour');
$people = get_sub_field('people');
?>
<section class="flex-people <?= $bg_color ?>">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title"><?= get_sub_field('title'); ?></h2>
      </div>
    </div>
    <div class="row">
      <?php
      if ($people) {
        foreach ($people as $key => $person) {
          $id = $person['person'];
          ?>
          <div class="col-12 col-md-4 p-30 person-wrap">
            <div class="person">
              <div class="featured-image">
                <?= get_the_post_thumbnail( $id, 'person', array('class' => 'img-fluid') ); ?>
              </div>
              <h3><?= get_the_title($id); ?></h3>
              <span class="position"><?= the_field('position', $id); ?></span>
              <div class="description">
                <?= rsi_get_content($id); ?>
              </div>
              <div class="bottom">
                <a href="mailto:<?= the_field('email', $id); ?>">Email</a>
                <a href="<?= the_field('linkedin', $id); ?>" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</section>