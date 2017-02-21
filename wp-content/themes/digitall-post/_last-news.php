      <div id="news_module">
        <div class="position">
          <div class="wrapper">
            <!-- Title -->
            <h3 class="cat_name">&Uacute;ltimas Noticias</h3>
            

            <div class="news_holder">
              <ol>
                <?php
                $lastPosts = get_posts(array(
                  'numberposts' => 15,

                ));
                if ( $lastPosts ) :
                  foreach ( $lastPosts as $post ) :
                    setup_postdata($post);
                ?>
                <li>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <span class="cat_name"><?= kxn_get_first_category_link( $post->ID ); ?></span>
                  <span class="date"><?php kxn_the_time_diff(); ?></span>
                </li>
                <?php
                  endforeach;
                  wp_reset_postdata();
                endif;
                ?>
              </ol>
            </div>
          </div>
        </div>
      </div>