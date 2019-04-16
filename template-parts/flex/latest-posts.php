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
        'post_type' => 'posts',
        'numberposts' => $show_posts
      );

      $posts = get_posts($args);
      if ($posts) {
        $post_total = count($posts);
        foreach ($posts as $key => $post) {
          setup_postdata( $post );
          ?>
          <div class="col-12 col-lg-4 p-30">
            <div class="news-item">
              <div class="featured-image">
                <?php the_post_thumbnail( 'card', array('class' => 'img-fluid') ); ?>
              </div>
              <?php the_title('<h3>','</h3>'); ?>
              <div class="post-excerpt">
                <?php the_excerpt(); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
            </div>
          </div>
          <?php
          wp_reset_postdata();
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