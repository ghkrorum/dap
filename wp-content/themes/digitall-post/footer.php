    <!-- FOOTER -->
      <footer>
        <div class="wrapper_container">
          <div class="content_holder">
            

            <!-- MENU -->
            <?php 
            $locations = get_nav_menu_locations();
            if ( isset($locations['digitall_post_footer_menu']) ) {
              wp_nav_menu( array( 
                'theme_location' => 'digitall_post_footer_menu',
                'menu_class' => 'menu'
              )); 
            }
            ?>
            <!-- /MENU -->
          </div>
        </div>
      </footer>
      <!-- /FOOTER -->
    </div>



    <?php wp_footer(); ?>
    
    <?php if ( displayInReadTag() ) : ?>
        <script src="//a.teads.tv/page/66965/tag" async="true"></script>
    <?php endif; ?>
  </body>
</html>
