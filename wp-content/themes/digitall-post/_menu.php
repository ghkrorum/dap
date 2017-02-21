      <!-- MAIN MENU -->
      <!-- MAIN MENU -->
      <div id="main_menu">
        <div class="wrapper_container">

          <!-- NEWSLETTER -->
          <div id="newsletter_head">

            <!-- SOCIAL NETWORKS -->
            <ul class="social">
              <?php
              $facebook = get_field('acf_options_facebook', 'option');
              $twitter = get_field('acf_options_twitter', 'option');
              $youtube = get_field('acf_options_youtube', 'option');
              ?>
              <?php if ( $facebook ) : ?>
              <li class="facebook">
                <a href="<?= $facebook; ?>" class="fa fa-facebook" target="_blank"><span >Facebook</span></a>
              </li>
              <?php endif; ?>
              <?php if ( $twitter ) : ?>
              <li class="twitter">
                <a href="<?= $twitter; ?>" class="fa fa-twitter" target="_blank"><span>Twitter</span></a>
              </li>
              <?php endif; ?>
              <?php if ( $youtube ) : ?>
              <li class="youtube">
                <a href="<?= $youtube; ?>" class="fa fa-youtube" target="_blank"><span>Youtube</span></a>
              </li>
              <?php endif; ?>
            </ul>
            <!-- /SOCIAL NETWORKS -->
            
            
            <!-- Newsletter -->
            <a href="#" class="newsletter">Inscr&iacute;bete a nuestro <span>newsletter</span></a>
            <!-- /Newsletter -->


            <!-- SEARCH BUTTON -->
            <a class="searchWindowOpen_btn">Buscar</a>
            <!-- /SEARCH BUTTON -->
          </div>
          <!-- /NEWSLETTER -->


          <!-- MENU -->
          <div class="menu_holder">
            <!-- MENU ICON -->
            <div class="menu_icon">
              <a href="#"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
            </div>
            <!-- /MENU ICON -->


            <!-- LOGO -->
            <div class="logo">
              <a href="<?php echo home_url();?>">Digitall Post</a>
            </div>
            <!-- /LOGO -->

            <?php wp_nav_menu( array( 
              'theme_location' => 'digitall_post_menu',
              'container' => 'nav',
              'walker' => new Digitall_Post_Walker_Main_Nav_Menu()
            )); ?>

            <!-- NAVIGATION -->
            
            <!-- /NAVIGATION -->
          </div>
          <!-- /MENU -->

        </div>
      </div>
      <!-- /MAIN MENU -->