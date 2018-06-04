<?php $bg_color = get_sub_field('background_colour'); ?>
<section class="flex-latest-news <?= $bg_color ?>">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title">Latest News</h2>
      </div>
    </div>
    <div class="row d-none d-lg-flex">
      <?php
      $args = array(
        'post_type' => 'news',
        'numberposts' => 3
      );

      $posts = get_posts($args);
      if ($posts) {
        $post_total = count($posts);
        foreach ($posts as $key => $post) {
          setup_postdata( $post );
          ?>
          <div class="col-12 col-lg-4 p-30">
            <div class="news-item">
              <?php the_title('<h3>','</h3>'); ?>
              <span class="post-type">News</span>
              <div class="post-excerpt">
                <?= get_excerpt_nostrip($post->ID); ?>
              </div>
              <div class="featured-image">
                <?php the_post_thumbnail( 'card', array('class' => 'img-fluid') ); ?>
              </div>
              <a href="<?php the_permalink(); ?>">Read more</a>
            </div>
          </div>
          <?php
          wp_reset_postdata();
        }
      }
      ?>
    </div>
    <div class="row d-lg-none">
      <div class="col-12">
        <div id="lastestnewscarousel" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner">
            <?php
            if ($posts) {
              $post_total = count($posts);
              foreach ($posts as $key => $post) {
                setup_postdata( $post );
                $active = ($key === 0) ? ' active':'';
                ?>
                <div class="carousel-item<?= $active ?>">
                  <div class="news-item">
                    <?php the_title('<h3>','</h3>'); ?>
                    <span class="post-type">News</span>
                    <div class="post-excerpt">
                      <?= get_excerpt_nostrip($post->ID); ?>
                    </div>
                    <div class="featured-image">
                      <?php the_post_thumbnail( 'card', array('class' => 'img-fluid') ); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>">Read more</a>
                  </div>
                </div>
                <?php
                wp_reset_postdata();
              }
            }
            ?>
          </div>

          <ol class="carousel-indicators">
            <?php
            if ($posts) {
              $post_total = count($posts);
              foreach ($posts as $key => $post) {
                setup_postdata( $post );
                ?>
                <li data-target="#lastestnewscarousel" data-slide-to="0" class="active"></li>
                <?php
                wp_reset_postdata();
              }
            }
            ?>
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <a href="<?= get_bloginfo('url'); ?>/news" class="btn btn-purple btn-section">See All News</a>
      </div>
    </div>
  </div>
</section>