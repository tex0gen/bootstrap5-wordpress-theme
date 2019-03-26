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
        <?php
        foreach ($accreditations as $key => $accr) {
          ?>
          <div class="col-6 col-md">
            <div class="text-center">
              <?= wp_get_attachment_image( $accr['image']['ID'], 'medium', false, array('class' => 'img-fluid') ); ?>
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