<?php
get_header();
the_post();
  
?>
    <div id="main_container" class="fluid_container">

      <?php include_once('_menu.php'); ?>
      
      <!-- MAIN ARTICLE -->
      <header>
        <div class="wrapper">
          <div class="position">
            <div class="slider">

              <!-- Top Article -->
              <div class="main_holder">
                <div class="content">

                  <!-- Photo-->
                  <div class="photo_holder">
                    
                    <a><?php the_post_thumbnail( '1045x697' ); ?></a>
                    
                  </div>

                  <!-- Info -->
                  <div class="article_info">
                    <h2><?php the_title(); ?></h2>


                    <div class="meta_holder">
                      <span class="cat_name"><?= kxn_get_first_category_link( $post->ID ); ?></span>
                      <span class="date"><?php kxn_the_time_diff(); ?></span>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </header>
      <!-- /MAIN ARTICLE -->


      


      <!-- NEWS -->
      <?php include '_last-news.php'; ?>
      <!-- /NEWS -->



      <!-- ARTICLE CONTAINER -->
      <section class="article_module">
        <span class="circle_icon"></span>

        <div class="wrapper_container">

          <!-- ARTICLE -->
          <article>

            <?php

            $authorThumb = '';
            $authorName = '';
            $twitterName = '';

            $author = get_field('acf_author');
            if ( $author ):
              $post = $author[0];
              setup_postdata($post);
              $twitterName = '';
              $authorName = get_the_title();
              $twitter = get_field('acf_twitter');
              $twitterUrl = '';
              if ( $twitter ){
                $twitterUrl = 'https://twitter.com/'.$twitter;
              }

              $authorThumb = get_the_post_thumbnail($post->ID, 'author_thumb');
              if ( $twitterUrl ){
                $format = '<a href="%1$s" target="_blank">%2$s</a>';
                $authorThumb = sprintf( $format, $twitterUrl, $authorThumb );
                $authorName = sprintf( $format, $twitterUrl, $authorName );
                $twitterName = sprintf( '<a href="%1$s" target="_blank"><span>@%2$s</span></a>', $twitterUrl, $twitter );
                
              }
              

            ?>
            <!-- Author -->
            <div class="author_holder">
              <div class="photo_holder">
                <?= $authorThumb; ?>
              </div>
              <p>Por: <a href=""><?= $authorName; ?></a> <?= $twitterName ?></p>
            </div>
            <!-- /Author -->
            <?php 
              wp_reset_postdata();
            endif; ?>


            <!-- Social Share -->
            <ol class="socialShare_list">
              <li><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
              <li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
              <li><a href="#" class="fa fa-whatsapp"><span>Whatsapp</span></a></li>
              <li><a href="#" class="fa fa-envelope"><span>Mail</span></a></li>
            </ol>
            <!-- /Social Share -->

            <!-- Content -->
            <div class="content_holder">
              <?php
              if ( in_category( 'x-plainers' ) ) :
              ?>

              <?php
              if ( have_rows('acf_topics') ) :
                while( have_rows('acf_topics') ) : the_row();

              ?>
              <h1><?php the_sub_field('acf_topic_title'); ?></h1>
              <?php the_sub_field('acf_topic_content'); ?>
              <?php 
                endwhile;
              endif; ?>
              
              <?php else : ?>

              <?php the_content(); ?>

              <?php 
              endif;
              ?>

            </div>
            <!-- /Content -->

            <!-- Tags -->
            <?php
            $tags = kxn_get_tag_links();
            if ($tags) :
            ?>
            <div class="tags_holder">
              Tags:&nbsp;
              <ol>
                <?php foreach ( $tags as $tag ) : ?>
                <li><?= $tag; ?></li>
                <?php endforeach; ?>
              </ol>
            </div>
            <?php endif;?>
            <!-- /Tags -->

            <?php
            if ($authorName):
            ?>
            <!-- Author -->
            <div class="author_holder">
              <div class="photo_holder">
                <?= $authorThumb; ?>
              </div>
              <p>Por: <?= $authorName; ?> <?= $twitterName; ?></p>
            </div>
            <!-- /Author -->
            <?php endif; ?>

        
            <!-- Social Share -->
            <ol class="socialShare_list">
              <li><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
              <li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
              <li><a href="#" class="fa fa-whatsapp"><span>Whatsapp</span></a></li>
              <li><a href="#" class="fa fa-envelope"><span>Mail</span></a></li>
            </ol>
            <!-- /Social Share -->
          </article>
          <!-- /ARTICLE -->
          


          <!-- ASIDE -->
          <aside>


            <?php if ( is_active_sidebar( 'digitall_post_single_sidebar' ) ) : ?>
              <!-- <aside> -->
                <?php dynamic_sidebar( 'digitall_post_single_sidebar' ); ?>
              <!-- </aside> -->
            <?php endif; ?>
            
          </aside>
          <!-- /ASIDE -->
        </div>


        <?php
        $relatedPosts = get_field('acf_related_posts');
        if ( $relatedPosts ) :
        ?>
        <!-- RELACIONADOS -->
        <div class="relacionados_holder">
          <div class="wrapper_container">

            <!-- Title -->
            <h3 class="cat_name">Relacionados</h3>
            
            <ol class="latest_list">
              <?php foreach ( $relatedPosts as $post ) : setup_postdata( $post ); ?>
              <!-- ITEM -->
              <li class="video_type">
                <!-- Photo -->
                <div class="photo_holder">
                  <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"><?php the_post_thumbnail( '450x300', array( 'class' => 'img-responsive' ) ); ?></a>
                </div>
                
                <!-- Info -->
                <div class="info_holder">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                  <div class="meta_holder">
                    <span class="cat_name"><?= kxn_get_first_category_link($post->ID); ?></span>
                    <span class="date"><?php kxn_the_time_diff(); ?></span>
                  </div>
                </div>
              </li>
              <!-- /ITEM -->
            <?php endforeach; ?>
            </ol>
          </div>
        </div>
        <!-- /RELACIONADOS -->
        <?php 
          wp_reset_postdata();
        endif;?>

        
        <!-- MORE ARTICLES -->
        <section id="loadMore_module" class="">
          <span class="circle_icon"></span>

          <div class="wrapper_container">
            <!-- Button: More -->
            <div class="loading_holder">Loading...</div>
          </div>
        </div>
        <!-- /MORE ARTICLES -->

      </section>
      <!-- /ARTICLE CONTAINER -->
<?php 
get_footer(); 
?>