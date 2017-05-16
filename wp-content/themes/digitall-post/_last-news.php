      <div id="news_module">
        <span class="circle_icon"></span>
        <div class="position">
          <div class="wrapper">
             <div class="top_holder">
              <a href="<?php echo home_url();?>" class="logo"><img src="<?= THEME_URL; ?>/images/logo.png" ></a>

              <h3 class="cat_name">&Uacute;ltimas Noticias</h3>
            </div>
            

            <div class="news_holder">
              <ol>
                <?php
                $lastPosts = get_posts(array(
                  'numberposts' => 15,

                ));
                if ( $lastPosts ) :
                  $lastPostsCount = 0;
                  foreach ( $lastPosts as $post ) :
                    setup_postdata($post);
                ?>
                <li>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <span class="cat_name"><?= kxn_get_first_category_link( $post->ID ); ?></span>
                  <span class="date"><?php kxn_the_time_diff(); ?></span>
                </li>
                <?php if ( $lastPostsCount == 5 ) : ?>

                <?php if ( is_active_sidebar( 'digitall_last_news_banner' ) ) : ?>
                <li class="last_news_banner">
                  <div class="banner_holder"> 
                  <?php dynamic_sidebar( 'digitall_last_news_banner' ); ?>
                  </div>
                </li>
                <?php endif; ?>        

                <?php endif; ?>

                <?php
                    $lastPostsCount++;
                  endforeach;
                  wp_reset_postdata();
                endif;
                ?>

                
              </ol>
            </div>
          </div>
        </div>
      </div>