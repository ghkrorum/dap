<?php
get_header();
$excludePostIdArray = array();
$currentCategory = get_category(get_query_var('cat'));
?>
    <div id="main_container" class="fluid_container">

      <?php include_once('_menu.php'); ?>
      
      <?php 
      if ( have_posts() ) : the_post(); 
        $excludePostIdArray[] = $post->ID;
      ?>
      <!-- MAIN ARTICLE -->
      <header class="section_template">
        <div class="wrapper">
          <div class="slider">
            
            <!-- Top Article -->
            <div class="main_holder">
              <div class="content">

                <!-- Photo -->
                <div class="photo_holder">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( '1045x482' ); ?></a>
                </div>

                <!-- Info -->
                <div class="article_info">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                  <div class="meta_holder">
                    <span class="cat_name"><?= kxn_get_first_category_link( $post->ID ); ?></span>
                    <span class="date"><?php kxn_the_time_diff(); ?></span>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Top Article -->

            <?php if ( is_active_sidebar( 'digitall_section_mobile_banner_1' ) ) : ?>
              <div class="banner_holder banner-mobile"> 
                <?php dynamic_sidebar( 'digitall_section_mobile_banner_1' ); ?>
              </div>
            <?php endif; ?>

            <?php 
            if ( more_posts() ) :
            ?>
            <!-- Column Articles -->
            <div class="latest_holder">
              <ul>
                <?php
                for ( $i = 0 ; more_posts() && $i < 3 ; $i++ ) : 
                  the_post();
                  $excludePostIdArray[] = $post->ID;
                  $itemClass = ( kxn_post_is_video() )?'video_type':'';
                ?>
                <!-- Item -->
                <li>
                  <!-- Photo -->
                  <div class="photo_holder <?= $itemClass; ?>">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('351x215', array('alt' => get_the_title() )); ?></a>
                  </div>

                  <!-- Info -->
                  <div class="article_info">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="meta_holder">
                      <span class="cat_name"><?= kxn_get_first_category_link($post->ID); ?></span>
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
      <?php endif; ?>


      


      <!-- NEWS -->
      <?php include '_last-news.php';?>
      <!-- /NEWS -->


      <?php if ( is_active_sidebar( 'digitall_section_mobile_banner_2' ) ) : ?>
        <div class="banner_holder banner-mobile"> 
          <?php dynamic_sidebar( 'digitall_section_mobile_banner_2' ); ?>
        </div>
      <?php endif; ?>

      
      <?php if ( is_active_sidebar( 'digitall_section_banner_1' ) ) : ?>
      <div class="wrapper_container">
        <div class="banner_holder banner-desktop"> 
          <?php dynamic_sidebar( 'digitall_section_banner_1' ); ?>
        </div>
      </div>
      <?php endif; ?>


      <?php if ( more_posts() ) : ?>

      <!-- LATEST -->
      <section id="latest_module" class="section_template">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
          <ol class="latest_list">

            <?php 
            for ( $i = 0 ; more_posts() ; $i++ ) : 
              the_post(); 
              $excludePostIdArray[] = $post->ID; 
            ?>
            <!-- ITEM -->
            <?php get_template_part( 'template-parts/section/more-item' ); ?>
            <!-- /ITEM -->
            <?php endfor; ?>

          </ol>

          <?php if ( is_active_sidebar( 'digitall_section_banner_2' ) ) : ?>
            <div class="banner_holder banner-desktop"> 
              <?php dynamic_sidebar( 'digitall_section_banner_2' ); ?>
            </div>
          <?php endif; ?>

          <?php echo do_shortcode('[ajax_load_more container_type="ol" css_classes="latest_list" post_type="post" category="'.$currentCategory->slug.'" post__not_in="' . implode(",", $excludePostIdArray ) . '" posts_per_page="8" button_label = "Ver más" button_loading_label="Cargando más noticias" scroll="true"]'); ?>
        </div>
      </section>
      <!-- /LATEST -->
      <?php endif; ?>

      

      <!-- LATEST -->
      <section id="loadMore_module" class="">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
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