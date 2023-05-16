<section class="flex-latest-posts">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
      </div>
    </div>
    <div class="row">
      <?php
      $num_posts = get_sub_field('number_posts');
      $show_posts = ($num_posts) ? $num_posts:3;

      $args = array(
        'post_type' => 'post',
        'numberposts' => $show_posts
      );

      $post_items = get_posts($args);

	  if ($post_items) {
        $post_total = count($post_items);
        foreach ($post_items as $key => $item) {
          ?>
          <div class="col-12 col-lg-4 p-30">
            <div class="news-item">
              <div class="featured-image">
                <?= get_the_post_thumbnail( $item->ID, 'card', array('class' => 'img-fluid') ); ?>
              </div>
              <h3><?= get_the_title($item->ID); ?></h3>
              <div class="post-excerpt">
                <?php get_the_excerpt( $item->ID ); ?>
              </div>
              <a href="<?= get_permalink( $item->ID ); ?>" class="btn btn-primary">Read more</a>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <a href="<?= get_bloginfo('url'); ?>/news" class="btn btn-primary">See All News</a>
      </div>
    </div>
  </div>
</section>
