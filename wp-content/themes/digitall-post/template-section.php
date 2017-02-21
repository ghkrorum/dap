<?php
/*
Template Name: Section
*/
get_header();
the_post();
$excludePostIdArray = array();
?>
    <div id="main_container" class="fluid_container">

      <?php include_once('_menu.php'); ?>

      <?php 
      $featuredNews = get_field('acf_featured_news');

      if ( $featuredNews ) :
        $totalNews = count( $featuredNews );
      ?>
      
      <!-- MAIN ARTICLE -->
      <header class="section_template">
        <div class="wrapper">
          <div class="slider">
            <?php
            $post = $featuredNews[0];
            setup_postdata( $post );
            $excludePostIdArray[] = $post->ID;
            ?>
            <!-- Top Article -->
            <div class="main_holder">
              <div class="content">

                <!-- Photo -->
                <div class="photo_holder">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('1045x482', array('alt' => get_the_title() )); ?></a>
                </div>

                <!-- Info -->
                <div class="article_info">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                  <div class="meta_holder">
                    <span class="cat_name"><?= kxn_get_first_category_link($post->ID); ?></span>
                    <span class="date"><? kxn_the_time_diff(); ?></span>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Top Article -->

            <?php
            if ( $totalNews > 1 ) :
            ?>
            <!-- Column Articles -->
            <div class="latest_holder">
              <ul>
                <?php
                for ( $i=1; $i < $totalNews ; $i++ ):
                  $post = $featuredNews[$i];
                  setup_postdata($post);
                  $excludePostIdArray[] = $post->ID;
                ?>
                <!-- Item -->
                <li>
                  <!-- Photo -->
                  <div class="photo_holder">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('351x215', array('alt' => get_the_title() )); ?></a>
                  </div>

                  <!-- Info -->
                  <div class="article_info">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="meta_holder">
                      <span class="cat_name"><?= kxn_get_first_category_link( $post->ID ); ?> </span>
                      <span class="date"><?php kxn_the_time_diff(); ?></span>
                    </div>
                  </div>
                </li>
                <!-- Item -->
                <?php endfor; ?>
              </ul>
            </div>
            <!-- /Column Articles -->
            <?php endif; ?>

          </div>
        </div>
      </header>
      <!-- /MAIN ARTICLE -->
      <?php 
        wp_reset_postdata();
      endif;
      ?>


      


      <!-- NEWS -->
      <?php include '_last-news.php';?>
      <!-- /NEWS -->

      
      <?php if ( is_active_sidebar( 'digitall_section_banner_sidebar' ) ) : ?>
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_section_banner_sidebar' ); ?>
        </div>
      <?php endif; ?>



      <?php
      $moreNews = get_field('acf_more_news');
      if ( $moreNews ):
      ?>
      <!-- LATEST -->
      <section id="latest_module" class="section_template">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
          <ol class="latest_list">
            <?php 
            foreach ( $moreNews as $post ) :
              setup_postdata( $post );
              $excludePostIdArray[] = $post->ID;
              $itemClass = ( kxn_post_is_video() )?'video_type':'';
            ?>
            <!-- ITEM -->
            <li class="<?= $itemClass; ?>">
              <!-- Photo -->
              <div class="photo_holder">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('960x640', array('alt' => get_the_title() )); ?></a>
              </div>
              
              <!-- Info -->
              <div class="info_holder">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                <div class="meta_holder">
                  <span class="cat_name"><?php kxn_get_first_category_link($post->ID); ?></span>
                  <span class="date"><?php kxn_the_time_diff(); ?></span>
                </div>
              </div>
            </li>
            <!-- /ITEM -->
            <?php endforeach; ?>
            
          </ol>
        </div>
      </section>
      <!-- /LATEST -->
    <?php 
      wp_reset_postdata();
    endif; ?>


      <?php 
      // This block is not used
      $video = get_field('acf_video');
      if (false):
      ?>
      <!-- FEATURED VIDEO -->
      <section id="videoFeatured_module">
        <!-- Circle Icon -->
        <span class="circle_icon"></span>
        
        <div class="wrapper_container">

          <!-- Video -->
          <div class="content_holder">

            <!-- Title -->
            <h3 class="cat_name">Video</h3>
            
            <!-- Photo -->
            <div class="photo_holder"></div>
            
            <!-- Video -->
            <div class="video_holder">
              <?php the_field('acf_video'); ?>
            </div>

            <!-- Info -->
            <div class="info_holder">
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <div class="meta_holder">
                <span class="cat_name"><?= kxn_get_first_category_link($post->ID); ?></span>
                <span class="date"><?php kxn_the_time_diff(); ?></span>
              </div>
            </div>
          </div>

          <!-- Button: More -->
          <!-- <a href="#" class="see_more">M&aacute;s Videos</a> -->
        </div>
      </section>
      <!-- /FEATURED VIDEO -->
      <?php endif; ?>

      <?php
      $moreTerms = get_field('acf_load_more_terms');
      if ( $moreTerms ):
        $termSlugs = array();
          foreach ( $moreTerms as $term ) :
            $termSlugs[] = $term->slug;
          endforeach;
      ?>
      <!-- LATEST -->
      <section id="loadMore_module" class="">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
          <?php echo do_shortcode('[ajax_load_more container_type="ol" css_classes="latest_list" post_type="post" category="'.implode( ',', $termSlugs ).'" post__not_in="' . implode(",", $excludePostIdArray ) . '" posts_per_page="8" button_label = "Ver más" button_loading_label="Cargando más noticias" scroll="true"]'); ?>
          <ol class="latest_list">

            <!-- Ejemplo
            <li>
              <div class="photo_holder">
                <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_4.jpg" alt="Cristiano Ronaldo"></a>
              </div>
              
              <div class="info_holder">
                <h4><a href="#">Poker dorado de Cristiano Ronaldo</a></h4>

                <div class="meta_holder">
                  <span class="cat_name"><a href="#">Deportes</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </div>
              </div>
            </li>

            <li>
              <div class="photo_holder">
                <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_3.jpg" alt="Cristiano Ronaldo"></a>
              </div>
              
              <div class="info_holder">
                <h4><a href="#">Peregrinos superan los 7.1 millones en la Bas&iacute;lica</a></h4>

                <div class="meta_holder">
                  <span class="cat_name"><a href="#">Noticias</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </div>
              </div>
            </li>


            <li>
              <div class="photo_holder">
                <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_2.jpg" alt="Cristiano Ronaldo"></a>
              </div>
              
              <div class="info_holder">

                <h4><a href="#">PRI y PAN: dar marco legal a Fuerzas Armadas</a></h4>

                <div class="meta_holder">
                  <span class="cat_name"><a href="#">Noticias</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </div>
              </div>
            </li>

            <li>
              <div class="photo_holder">
                <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_5.jpg" alt=""></a>
              </div>
              
              <div class="info_holder">
                <h4><a href="#">CNDH pide que Ejército retome sus funciones</a></h4>

                <div class="meta_holder">
                  <span class="cat_name"><a href="#">Nticias</a></span>
                  <span class="date">Hace 2 Horas</span>
                </div>
              </div>
            </li>

            <li class="video_type">
              <div class="photo_holder">
                <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_1.jpg" alt="Cristiano Ronaldo"></a>
              </div>
              
              <div class="info_holder">
                <h4><a href="#">Oficial: Cristiano Ronaldo se lleva el Bal&oacute;n de Oro 2016</a></h4>

                <div class="meta_holder">
                  <span class="cat_name"><a href="#">Deportes</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </div>
              </div>
            </li>  
            -->          
          </ol>

          <!-- Button: More -->
          <!-- <div class="loading_holder">Loading...</div> -->
        </div>
      </section>
      <!-- /LATEST -->
      <?php endif; ?>
<?php get_footer(); ?>