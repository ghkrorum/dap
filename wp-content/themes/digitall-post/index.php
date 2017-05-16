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

                   
          </ol>

          <!-- Button: More -->
          <!-- <div class="loading_holder">Loading...</div> -->
        </div>
      </section>
      <!-- /LATEST -->
<?php get_footer(); ?>