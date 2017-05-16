<?php
get_header();
the_post();
?>
    <div id="main_container" class="fluid_container page_template">

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
                    <a><?php the_post_thumbnail('1047x680', array('alt' => get_the_title() )); ?></a>
                  </div>

                  <!-- Info -->
                  <div class="article_info">
                    <h2><?php the_title(); ?></h2>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </header>
      <!-- /MAIN ARTICLE -->


      

      
      <!-- NEWS -->
      <?php include('_last-news.php'); ?>
      <!-- /NEWS -->



      <!-- ARTICLE CONTAINER -->
      <section class="article_module">
        <span class="circle_icon"></span>

        <div class="wrapper_container">

          <!-- ARTICLE -->
          <article>

            <!-- Content -->
            <div class="content_holder">

              <?php the_content(); ?>

            </div>
            <!-- /Content -->

          </article>
          <!-- /ARTICLE -->
          
        </div>
      </section>
      <!-- /ARTICLE CONTAINER -->
<?php get_footer(); ?>