<?php
$featuredPost = get_sub_field('featured_news_item_post');
if ( $featuredPost ) :
  $post = $featuredPost;
  setup_postdata( $post );
?>
<!-- MAIN ARTICLE -->

        <div class="main_holder">
          <div class="content">

            <!-- Photo-->
            <a href="<?php the_permalink(); ?>">
            <div class="photo_holder">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('1045x697', array('alt' => get_the_title() )); ?></a>
            </div>
            </a>

            <!-- Info -->
            <div class="article_info">
              <h3 class="cat_name">Portada</h3>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

              <div class="meta_holder">
                <span class="cat_name"><?= kxn_get_the_category_link(); ?></span>
                <span class="date"><?php kxn_the_time_diff(); ?></span>
              </div>
            </div>

          </div>
        </div>

        
<!-- /MAIN ARTICLE -->
<?php 
  wp_reset_postdata();
endif;
?>