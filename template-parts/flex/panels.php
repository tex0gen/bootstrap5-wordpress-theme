<?php
$bg_colour = get_sub_field('background_colour');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
$panels = get_sub_field('panels');
$panel_count = count($panels);
?>
<?php if ( $panels ) { ?>
<section class="flex-panels <?= $bg_colour ?>">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 offset-md-2">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
          <?php
          for ( $i=0; $i < $panel_count; $i++ ) {
            $active = ($i === 0) ? ' active':'';
            ?>
            <li class="nav-item">
              <a class="nav-link<?= $active ?>" id="tab<?= $i ?>" data-toggle="tab" href="#panel<?= $i ?>" role="tab" aria-controls="panel<?= $i ?>" aria-selected="true"><?= $i + 1 ?></a>
            </li>
            <?php
          }
          ?>
        </ul>

        <div class="tab-content" id="myTabContent">
          <?php
          foreach ( $panels as $key => $panel ) {
            $active = ($key === 0) ? ' show active':'';
            $panel_image = $panel['panel_image'];
            $panel_title = $panel['panel_title'];
            $panel_content = $panel['panel_content'];
            ?>
            <div class="tab-pane fade<?= $active ?> text-center" id="panel<?= $key ?>" role="tabpanel" aria-labelledby="tab<?= $key ?>">
              <?= wp_get_attachment_image( $panel_image['ID'], 'large', false, array('class' => 'img-fluid img-panel') ); ?>
              <h3><?= $panel_title ?></h3>
              <?= $panel_content ?>
            </div>
          <?php } ?>
        </div>

        <?php if ( $button_text ) { ?>
        <div class="text-center">
          <a href="<?= $button_link ?>" class="btn btn-primary"><?= $button_text ?></a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>