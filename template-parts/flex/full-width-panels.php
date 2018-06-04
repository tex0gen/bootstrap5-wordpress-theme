<section class="flex-full-width-panels">
  <?php
  $panels = get_sub_field('panels');
  if ($panels) {
    foreach ($panels as $key => $panel) {
      $icon = wp_get_attachment_image( $panel['icon']['ID'], 'large',  false, array('class' => 'img-fluid') );
      ?>
      <div class="item-panel">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-8 offset-md-2 text-center">
              <?= $icon ?>
              <h3><?= $panel['title']; ?></h3>
              <?= $panel['text']; ?>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
  }
  ?>
</section>