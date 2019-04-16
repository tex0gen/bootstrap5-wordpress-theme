<?php
$logos = get_sub_field('logos');
if ($logos) {
  ?>
  <section class="flex-logos">
    <div class="container">
      <div class="row">
        <?php
        foreach ($logos as $key => $logo) {
          ?>
          <div class="col-6 col-md">
            <div class="text-center">
              <?php if ($logo['link']) { ?>
                <a href="<?= $logo['link'] ?>">
                  <?= wp_get_attachment_image( $logo['image']['ID'], 'medium', false, array('class' => 'img-fluid') ); ?>
                </a>
              <?php } else { ?>
                <?= wp_get_attachment_image( $logo['image']['ID'], 'medium', false, array('class' => 'img-fluid') ); ?>
              <?php } ?>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </section>
  <?php
}