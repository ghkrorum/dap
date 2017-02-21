<div id="main_container" class="fluid_container">

      
      <?php include_once( dirname(__FILE__) .'/../../_menu.php'); ?>


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
                    <?php the_post_thumbnail( '1045x697' ); ?>
                  </div>

                  <!-- Info -->
                  <div class="article_info">
                    <h2><?php the_title(); ?></h2>

                    <div class="meta_holder">
                      <span class="cat_name"><?= kxn_get_first_category_link($post->ID); ?></span>
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
      <?php include (dirname(__FILE__) .'/../../_last-news.php'); ?>
      <!-- /NEWS -->



      <!-- ARTICLE CONTAINER -->
      <section class="article_module">
        <span class="circle_icon"></span>

        <div class="wrapper_container">

          <!-- ARTICLE -->
          <article>
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
              if ( have_rows('acf_topics') ) :
                while( have_rows('acf_topics') ) : the_row();

              ?>
              <h1><?php the_sub_field('acf_topic_title'); ?></h1>
              <?php the_sub_field('acf_topic_content'); ?>
              <?php 
                endwhile;
              endif; ?>

            </div>
            <!-- /Content -->

            <!-- Tags -->
            <div class="tags_holder">
              Tags:&nbsp;
              <ol>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">ipsun</a></li>
                <li><a href="#">dolor</a></li>
              </ol>
            </div>
            <!-- /Tags -->

            <!-- Author -->
            <div class="author_holder">
              <div class="photo_holder">
                <a href="#"><img src="<?= THEME_URL; ?>/images/home/author.jpg" alt="Author Name" ></a>
              </div>
              <p>Por: <a href="#">Ju&aacute;n Francisco</a></p>
            </div>
            <!-- /Author -->

        
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
            <!-- NEWSLETTER -->
            <div class="newsletter _holder module">
              <div class="title_holder">
                <h4>Inscr&iacute;bete a nuestro<br/><span>Newsletter</span></h4>
              </div>

              <form class="newsletter_sidebar_frm" method="POST" action="#" >
                <fieldset>
                  <div class="data_holder">
                    <label for="nl_sidebar_mail">Mail</label>
                    <input type="text" name="nl_sidebar_mail" id="nl_sidebar_mail" value="" >
                  </div>

                  <div class="data_holder">
                    <input type="submit" name="nl_sidebar_submit" id="nl_sidebar_submit" value="Inscribirse" >
                  </div>
                </fieldset>
              </form>
            </div>
            <!-- /NEWSLETTER -->

            <!-- BANNER -->
            <div class="banners_holder module">
              <img src="<?= THEME_URL; ?>/images/home/banner_box.jpg" alt="Box Banner">
            </div>
            <!-- /BANNER -->

            <?php if ( is_active_sidebar( 'digitall_post_single_sidebar' ) ) : ?>
              <!-- <aside> -->
                <?php dynamic_sidebar( 'digitall_post_single_sidebar' ); ?>
              <!-- </aside> -->
            <?php endif; ?>
            
          </aside>
          <!-- /ASIDE -->
        </div>



        <!-- RELACIONADOS -->
        <div class="relacionados_holder">
          <div class="wrapper_container">

            <!-- Title -->
            <h3 class="cat_name">Relacionados</h3>
            
            <ol class="latest_list">
              <!-- ITEM -->
              <li class="video_type">
                <!-- Photo -->
                <div class="photo_holder">
                  <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_1.jpg" alt="Cristiano Ronaldo"></a>
                </div>
                
                <!-- Info -->
                <div class="info_holder">
                  <h4><a href="#">Oficial: Cristiano Ronaldo se lleva el Bal&oacute;n de Oro 2016</a></h4>

                  <div class="meta_holder">
                    <span class="cat_name"><a href="#">Deportes</a></span>
                    <span class="date">Hace 20 Minutos</span>
                  </div>
                </div>
              </li>
              <!-- /ITEM -->


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
            </ol>
          </div>
        </div>
        <!-- /RELACIONADOS -->

        
        <!-- MORE ARTICLES -->
        <div id="loadMore_module">
          <div class="wrapper_container">
          
            <!-- Button: More -->
            <div class="loading_holder">Loading...</div>
          </div>
        </div>
        <!-- /MORE ARTICLES -->

      </section>
      <!-- /ARTICLE CONTAINER -->