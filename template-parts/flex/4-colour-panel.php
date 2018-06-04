<?php $panels = get_sub_field('panel'); ?>
<?php if ($panels) { ?>
<section class="flex-four-colour-panels">
  <?php foreach ($panels as $key => $panel) { ?>
    <div class="panel">
      <div class="panel-content">
        <h4 data-dropdown-panel><?= $panel['title'] ?> <img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/dropdown.png" class="dropdown" /></h4>
        <div class="panel-text"><?= $panel['text'] ?></div>
      </div>
    </div>
  <?php } ?>
</section>
<?php } ?>