<?php get_header(); ?>
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
                    <img src="<?= THEME_URL; ?>/images/cover_terminos.jpg">
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

                <h2>No hemos encontrado el contenido que buscas.</h2>
                <p>Te invitamos a realizar una búsqueda y navegar por nuestro sitio:</p>

                <?php get_search_form(); ?>

            </div>
            <!-- /Content -->

          </article>
          <!-- /ARTICLE -->
          
        </div>
      </section>
      <!-- /ARTICLE CONTAINER -->
<?php get_footer(); ?>