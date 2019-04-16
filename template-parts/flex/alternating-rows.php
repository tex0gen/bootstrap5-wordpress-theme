<?php
$alt_rows = get_sub_field('rows');
if ($alt_rows) {
	?>
	<section class="flex-alternating-rows">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1><?= the_sub_field('title'); ?></h1>
        </div>
      </div>
    	<?php foreach( $alt_rows as $key => $row ) {
    		if ($key % 2 == 1) {
    			$class = " order-md-6";
    		} else {
    			$class = "";
    		}
    	?>
      <div class="row align-items-center">
        <div class="col-12 col-md-6<?= $class ?>">
          <?= wp_get_attachment_image( $row['image']['ID'], 'alt-image', false, array('class' => 'img-fluid') ); ?>
        </div>
        <div class="col-12 col-md-6">
          <h2><?= $row['heading'] ?></h2>
          <?= $row['text'] ?>
          <?php if ( $row['button_text'] ) { ?>
          	<a href="<?= $row['button_link'] ?>" class="btn btn-primary"><?= $row['button_text'] ?></a>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>
	<?php
}