<?php
function do_social() {
  $social_icons = get_field('social', 'options');
  if ($social_icons) {
    foreach($social_icons as $key => $icon) {
      ?>
      <a href="<?= $icon['social_url'] ?>" target="_blank"><i class="<?= $icon['social_icon'] ?>"></i></a>
      <?php
    }
  }
}