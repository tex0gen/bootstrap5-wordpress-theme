<?php
$alt_rows = get_sub_field('rows');
if ($alt_rows) {
  ?>
  <section class="alternating">
    <div class="container">
      <?php if (get_sub_field('title')) { ?>
        <div class="row">
          <div class="col-12 text-center">
            <h2><?= the_sub_field('title'); ?></h2>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php
    foreach( $alt_rows as $key => $row ) {
      $bgColor = $row['background_colour'];

      if ($key % 2 == 1) {
        $class = " order-md-6";
      } else {
        $class = "";
      }
      ?>
      <div class="alternating-item" <?= ($bgColor) ? 'style="background-color: '.$bgColor.'"':''; ?>>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-md-6<?= $class ?>">
              <?= wp_get_attachment_image( $row['image']['ID'], 'alt-image', false, array('class' => 'img-fluid') ); ?>
            </div>
            <div class="col-12 col-md-6">
              <h3><?= $row['heading'] ?></h3>
              <?= $row['text'] ?>
              <?php if ( $row['button_text'] ) { ?>
                <a href="<?= $row['button_link'] ?>" class="btn btn-primary"><?= $row['button_text'] ?></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </section>
  <?php
}