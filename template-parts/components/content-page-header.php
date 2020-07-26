<?php $featured_image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'large', false ) ; ?>
<div class="page-header<?= ($featured_image) ? ' bg-image':''; ?>"<?= ($featured_image) ? ' style="background-image:url('.$featured_image.');"':''; ?>>
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php the_title('<h1>','</h1>'); ?>
      </div>
    </div>
  </div>
</div>