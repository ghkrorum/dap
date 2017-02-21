    <!-- FOOTER -->
      <footer>
        <div class="wrapper_container">
          <div class="content_holder">
            <!-- LOGO -->
            <div class="logo">
              <a href="#">Digitall Post</a>
            </div>
            <!-- /LOGO -->

            
            <!-- Newsletter -->
            <a href="#" class="newsletter"><span class="mob_hide">Inscr&iacute;bete a nuestro </span><strong>newsletter</strong></a>


            <!-- SOCIAL NETWORKS -->
            <ul class="social">
              <li class="facebook">
                <a href="#" class="fa fa-facebook fa-lg"><span >Facebook</span></a>
              </li>
              <li class="twitter">
                <a href="#" class="fa fa-twitter fa-lg"><span>Twitter</span></a>
              </li>
              <!--
              <li class="youtube">
                <a href="#" class="fa fa-youtube fa-lg"><span>Youtube</span></a>
              </li>
              -->
            </ul>
            <!-- /SOCIAL NETWORKS -->


            <!-- MENU -->
            <?php wp_nav_menu( array( 
              'theme_location' => 'digitall_post_footer_menu',
              'menu_class' => 'menu'
            )); ?>
            <!-- /MENU -->
          </div>
        </div>
      </footer>
      <!-- /FOOTER -->
    </div>



    <?php wp_footer();?>
  </body>
</html>
