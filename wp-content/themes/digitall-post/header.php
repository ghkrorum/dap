<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>
        <?php wp_title(''); ?>
        <?php if(wp_title('', false)) { echo ' :'; } ?>
        <?php bloginfo('name'); ?>
    </title>
    <?php wp_head(); ?>
    
    
  </head>
  <body>

    <!-- MOBILE MENU -->
    <div id="mobile_menu">

      <!-- NAVIGATION -->
      <?php wp_nav_menu( array( 
              'theme_location' => 'digitall_post_mobile_menu',
        'container' => '',
        'menu_class' => 'menu',
        'walker' => new Digitall_Post_Walker_Main_Mobile_Menu()
      )); ?>

      <?php wp_nav_menu( array( 
              'theme_location' => 'digitall_post_mobile_headline_menu',
        'container' => '',
        'menu_class' => 'headliners'
      )); ?>

      <!-- <ul class="headliners">
        <li>
          <a href="#">Video</a>
        </li>
        <li>
          <a href="#">Explainers</a>
        </li>
      </ul> -->
      <!-- /NAVIGATION -->

      
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
          <a href="<?= $youtube;?>" class="fa fa-youtube" target="_blank"><span>Youtube</span></a>
        </li>
        <?php endif; ?>
      </ul>
      <!-- /SOCIAL NETWORKS -->


      <!-- SEARCH FORM -->
      <div class="search-form">
        <form action="<?php echo home_url();?>" method="get">
        <fielset>
          <label for="search_txt">Buscar</label>
          <input type="text" id="search-term-input" name="s" value="" />
        </fielset>
        </form>
      </div>
      <!-- /SEARCH FORM -->


      <!-- LEGALES -->
      <div class="legales">
        DigitAllPost 2016&copy;<br>
        Todos los derechos reservados<br>
        <?php
        $privacyUrl = get_field('acf_privacy_url', 'option');
        if ($privacyUrl) :
        ?>
        <a href="<?= $privacyUrl; ?>">Términos y condiciones</a>
        <?php 
        endif; 
        ?>
        <br>
        <a href="#">Contacto</a>
      </div>
      <!-- /LEGALES -->
      
    </div>
    <!-- /MOBILE MENU -->



    <!-- SEARCH LIGHTBOX -->
    <div id="search_module">
      <!-- OVERLAY -->
      <div class="overlay"></div>

      <div class="content_holder">
        <!-- SEARCH FORM -->
        <div class="search-form" id="modal-search-form">
          <fielset>
            <label for="search_txt">Buscar</label>
            <input type="text" id="search_txt" class="search-term-input" name="search_txt" value="" />
          </fielset>

          <div class="status">
            Escribe al menos 3 letras para buscar.
          </div>
        </div>
        <!-- /SEARCH FORM -->

        
        <!-- NEWS -->
        <ol id="search-results">
        </ol>
        <!-- /NEWS -->
      </div>
    </div>
    <!-- /SEARCH LIGHTBOX -->

    <!-- NEWSLETTER LIGHTBOX -->
    <div id="newsletter_module" class="modal_module">
      <!-- OVERLAY -->
      <div class="overlay"></div>

      <div class="content_holder">
        <!-- SEARCH FORM -->
        <div class="search-form" >
          <?php echo do_shortcode( '[contact-form-7 id="174666" title="Newsletter"]' ); ?>
        </div>
        <!-- /SEARCH FORM -->

        
        <!-- NEWS -->
        <ol id="search-results">
        </ol>
        <!-- /NEWS -->
      </div>
    </div>
    <!-- /SEARCH LIGHTBOX -->