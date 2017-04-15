<?php
/*
Template Name: Home
*/
get_header();
the_post();
$excludePostIdArray = array();
?>
    <div id="main_container" class="fluid_container">

      <?php include_once('_menu.php'); ?>
      
      

      <header class="section_template">
        <div class="wrapper">
          <div class="position">
            <div class="slider">

              <!-- Top Article -->
              <?php
              if ( have_rows('featured_news_item') ) :
                the_row(); 
                if ( get_row_layout() == 'post' ) :
                  include 'template-parts/home/featured-news-item.php';
                else :
                  include 'template-parts/home/featured-news-item-custom.php';
                endif;
              endif;

              ?>

              <?php if ( is_active_sidebar( 'digitall_home_mobile_banner_1' ) ) : ?>
              <div class="wrapper_container banner-mobile">
                <div class="banner_holder"> 
                  <?php dynamic_sidebar( 'digitall_home_mobile_banner_1' ); ?>
                </div>
              </div>
              <?php endif; ?>
              
              <?php 
              $featuredNews = get_field('acf_featured_news');
              if ( $featuredNews ) :
              ?>
              <!-- Column Articles -->
              <div class="latest_holder">
                <ul>
                  <?php 
                  foreach ( $featuredNews as $post ) : 
                    setup_postdata($post);
                    $itemClass = ( kxn_post_is_video() )?'video_type':'';
                  ?>
                  <!-- Item -->
                  <li>
                    <!-- Photo -->
                    <div class="photo_holder <?= $itemClass; ?>">
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('1045x697', array('alt' => get_the_title() )); ?></a>
                    </div>

                    <!-- Info -->
                    <div class="article_info">
                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <div class="meta_holder">
                        <span class="cat_name"><?= kxn_get_the_category_link(); ?></span>
                        <span class="date"><?php kxn_the_time_diff(); ?></span>
                      </div>
                    </div>
                  </li>
                  <!-- Item -->
                  <?php endforeach; ?>

                </ul>
              </div>
              <!-- /Column Articles -->
              <?php 
                wp_reset_postdata();
              endif; ?>

            </div>
          </div>
        </div>
      </header>
      
      <?php if ( is_active_sidebar( 'digitall_home_mobile_banner_2' ) ) : ?>
      <div class="wrapper_container banner-mobile">
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_home_mobile_banner_2' ); ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- NEWS -->
      <?php include('_last-news.php'); ?>
      <!-- /NEWS -->

      <?php if ( is_active_sidebar( 'digitall_home_mobile_banner_3' ) ) : ?>
      <div class="wrapper_container banner-mobile">
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_home_mobile_banner_3' ); ?>
        </div>
      </div>
      <?php endif; ?>
      

      <?php if ( is_active_sidebar( 'digitall_home_banner_1' ) ) : ?>
      <div class="wrapper_container banner-desktop">
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_home_banner_1' ); ?>
        </div>
      </div>
      <?php endif; ?>
      


      <?php if ( have_rows('section_1_blocks') ) : ?>
      <!-- CATEGORY LATEST -->
      <section id="category_module">
        <div class="wrapper_container">

          <?php
          while ( have_rows('section_1_blocks') ) : 
            the_row(); 
            if ( have_rows('block_item') ):
              the_row();
              if ( get_row_layout() == 'category' ) :
                include 'template-parts/home/section1-block.php';
              elseif ( get_row_layout() == 'custom' ) :
                include 'template-parts/home/section1-block-custom.php';
              endif; 
            endif; 
          endwhile;
          ?>

        </div>
      </section>
      <!-- /CATEGORY LATEST -->
      <?php endif; ?>

      <?php if ( is_active_sidebar( 'digitall_home_banner_2' ) ) : ?>
      <div class="wrapper_container banner-desktop">
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_home_banner_2' ); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php 
      if ( have_rows('section_2_block') ) :
        while( have_rows('section_2_block') ) : 
          the_row();
          if ( get_row_layout() == 'category' ) :
            include 'template-parts/home/section2-block.php';
          elseif ( get_row_layout() == 'custom' ) :
            include 'template-parts/home/section2-block-custom.php';
          endif; 
        endwhile;
      endif;
      ?>

      <?php if ( is_active_sidebar( 'digitall_home_banner_3' ) ) : ?>
      <div class="wrapper_container banner-desktop">
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_home_banner_3' ); ?>
        </div>
      </div>
      <?php endif; ?>


      <?php
      $headlines = get_field('headlines');
      $moreLink = get_field('section_3_more_link');
      $moreCaption = get_field('section_3_more_caption');
      if ( $headlines ) : 
      ?>
      <!-- HEADLINERS -->
      <section id="headliners_module">
        <!-- Circle Icon -->
        <span class="circle_icon"></span>

        <div class="wrapper_container">
  
          <ul>
            <?php 
            foreach ($headlines as $post) : 
              $excludePostIdArray[] = $post->ID;
              setup_postdata( $post );
              $category = kxn_get_post_category();
            ?>
            <!-- ITEM -->
            <li>
              <div class="article_holder">
                <!-- Title -->
                <?php if ( $category ) : ?>
                <h3 class="cat_name"><?= esc_html( $category->name ); ?></h3>
                <?php endif; ?>
                
                <!-- Info -->
                <div class="info_holder">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <?php if ($category): ?>
                  <span class="cat_name"><a href="<?= esc_url( get_category_link( $category->term_id ) ); ?>"><?= esc_html( $category->name ); ?></a></span>
                  <?php endif; ?>
                  <span class="date"><?php kxn_the_time_diff(); ?></span>
                </div>
                
                <!-- Photo -->
                <div class="photo_holder">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('300x504', array('alt' => get_the_title() )); ?></a>
                </div>
              </div>
            </li>
            <!-- /ITEM -->
            <?php 
            endforeach;
            ?>

          </ul>
          <?php if ( $moreLink ) : ?>
          <a href="<?= $moreLink; ?>" class="see_more"><?= $moreCaption; ?></a>
          <?php endif; ?>
        </div>
      </section>
      <!-- /HEADLINERS -->
      <?php 
        wp_reset_postdata();
      endif;
      ?>

      <?php if ( is_active_sidebar( 'digitall_home_banner_4' ) ) : ?>
      <div class="wrapper_container banner-desktop">
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_home_banner_4' ); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php
      $posts = get_field('section_4_entries');
      $moreLink = get_field('section_4_more_link');
      $moreCaption = get_field('section_4_more_caption');
      
      if ( $posts ) :
      ?>
      <!-- EXPLAINERS -->
      <section id="explainers_module">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
          <ul>
            <?php 
            foreach  ( $posts as $post ) : 
              $excludePostIdArray[] = $post->ID;
              setup_postdata( $post );
              $category = kxn_get_post_category();
            ?>
            <!-- ITEM -->
            <li>
              <div class="article_holder">
                <!-- Title -->
                <?php if ( $category ) : ?>
                <h3 class="cat_name"><?= esc_html( $category->name ); ?></h3>
                <?php endif; ?>

                <!-- Info -->
                <div class="info_holder">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <?php if( $category ) : ?>
                  <span class="cat_name"><a href="<?= kxn_get_category_link( $category->term_id ); ?>"><?= esc_html( $category->name ); ?></a></span>
                  <?php endif; ?>
                  <span class="date"><?php kxn_the_time_diff(); ?></span>
                </div>

                <!-- Photo -->
                <div class="photo_holder">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('300x504', array('alt' => get_the_title() )); ?></a>
                </div>
              </div>
            </li>
            <!-- /ITEM -->
            <?php endforeach; ?>

          </ul>
          <?php if ( $moreLink ) : ?>
          <!-- Button: More -->
          <a href="<?= $moreLink ?>" class="see_more"><?= $moreCaption; ?></a>
          <?php endif; ?>
        </div>
      </section>
      <!-- /EXPLAINERS -->
      <?php 
      endif;
      ?>

      <?php if ( is_active_sidebar( 'digitall_home_banner_5' ) ) : ?>
      <div class="wrapper_container banner-desktop">
        <div class="banner_holder"> 
          <?php dynamic_sidebar( 'digitall_home_banner_5' ); ?>
        </div>
      </div>
      <?php endif; ?>
      
      <?php 
      $posts = get_field('section_5_entries');
      if ( $posts ):

      ?>
      <!-- LATEST -->
      <section id="latest_module" class="">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
          <ol class="latest_list">
            <?php 
            foreach ( $posts as $post ) :
              $excludePostIdArray[] = $post->ID;
              setup_postdata($post);
              $itemClass = ( kxn_post_is_video() )?'video_type':'';

            ?>
            <!-- ITEM -->
            <li class="<?= $itemClass;?>">
              <!-- Photo -->
              <div class="photo_holder">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  <?php the_post_thumbnail( '960x640' ); ?> </a>
              </div>
              
              <!-- Info -->
              <div class="info_holder">
                <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

                <div class="meta_holder">
                  <span class="cat_name"> <?= kxn_get_first_category_link($post->ID); ?> </span>
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
      endif;
      ?>




      

      

      <!-- LATEST -->
      <section id="loadMore_module" class="">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
          <?php echo do_shortcode('[ajax_load_more container_type="ol" css_classes="latest_list" post_type="post" post__not_in="' . implode(",", $excludePostIdArray ) . '" posts_per_page="8" button_label = "Ver más" images_loaded="true" button_loading_label="Cargando más noticias" scroll="true" scroll_distance="0"]'); ?>
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
<?php get_footer(); ?>