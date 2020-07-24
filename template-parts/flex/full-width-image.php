<?php $image = get_sub_field('image'); ?>
<section class="flex-full-width-image">
  <?= wp_get_attachment_image( $image['ID'], 'full-width', false, array('class' => 'w-100') ) ?>
</section>