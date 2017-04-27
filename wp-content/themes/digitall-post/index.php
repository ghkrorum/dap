<?php
get_header();
$s = isset( $_GET['s'] )?$_GET['s']:'';
?>
    <div id="main_container" class="fluid_container">

      <?php include_once('_menu.php'); ?>
      
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

     




      

      

      <!-- LATEST -->
      <section id="loadMore_module" class="">
        <span class="circle_icon"></span>

        <div class="wrapper_container">
          <?php echo do_shortcode('[ajax_load_more container_type="ol" css_classes="latest_list" post_type="post" search="'.$s.'" posts_per_page="8" button_label = "Ver más" images_loaded="true" button_loading_label="Cargando más noticias" scroll="true" scroll_distance="0"]'); ?>
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