<?php
$content_switch = get_sub_field('content_switcher');
if ($content_switch) {
  if ($content_switch) {
    ?>
    <style>
      body:after {
        display:none;
        content: 
        <?php
        foreach($content_switch as $key => $swi) {
          $hover_icon = $swi['icon_hover']['sizes']['large'];
          ?>
          url(<?= $hover_icon; ?>)
          <?php
        }
        ?>
        ;
      }
    </style>
    <?php
  }
  ?>
  <section class="flex-content-switcher">
    <div class="switching-plate">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="nav nav-tabs" id="switcherTabs" role="tablist">
              <?php
              foreach($content_switch as $key => $swi) {
                $active = ($key === 0) ? ' active':'';
                $id = strtolower(str_replace(' ', '', $swi['title']));
                $selected = ($key === 0) ? 'true':'false';
                ?>
                <a class="col switcher nav-item nav-link<?= $active ?>" id="nav-<?= $id ?>-tab" data-toggle="tab" href="#nav-<?= $id ?>" role="tab" aria-controls="nav-<?= $id ?>" aria-selected="<?= $selected ?>">
                  <div class="s-wrap">
                    <?php $svg = ($swi['icon']['mime_type'] === "image/svg+xml") ? ' svg-fm':''; ?>

                    <?= wp_get_attachment_image( $swi['icon']['ID'], 'large', false, array(
                      'class' => 'img-fluid switcher-icon' . $svg,
                      'data-hover' => $swi['icon_hover']['sizes']['large'],
                      'data-orig' => $swi['icon']['sizes']['large']
                    ) ); ?>
                    <span class="switcher-title"><?= $swi['title'] ?></span>
                  </div>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="switching-content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="tab-content" id="switcherContent">
              <?php
              foreach($content_switch as $key => $swi) {
                $active = ($key === 0) ? ' active show':'';
                $id = strtolower(str_replace(' ', '', $swi['title']));
                ?>
                <div class="tab-pane<?= $active ?>" id="nav-<?= $id ?>" role="tabpanel" aria-labelledby="nav-<?= $id ?>-tab">
                  <?= $swi['text']; ?>
                </div>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
  </section>
  <?php
}
?>