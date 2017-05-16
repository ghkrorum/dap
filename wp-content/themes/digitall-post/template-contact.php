<?php
/*
Template Name: Contact
*/
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
                    <a href="#"><img src="<?= THEME_URL; ?>/images/cover_contacto.jpg" alt="Contacto"></a>
                  </div>

                  <!-- Info -->
                  <div class="article_info">
                    <h2>Contacto</h2>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </header>
      <!-- /MAIN ARTICLE -->


      


      <!-- NEWS -->
      <div id="news_module">
        <div class="position">
          <div class="wrapper">
            <!-- Title -->
            <h3 class="cat_name">&Uacute;ltimas Noticias</h3>
            

            <div class="news_holder">
              <ol>
                <!-- Item -->
                <li>
                  <h4><a href="#">Oro se hunde ante euforia por el riesgo</a></h4>
                  <span class="cat_name"><a href="#">Noticias</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </li>
                <!-- Item -->

                <li>
                  <h4><a href="#">Las exportaciones de Am&eacute;rica Latina caer&aacute;n un 6%</a></h4>
                  <span class="cat_name"><a href="#">Deportes</a></span>
                  <span class="date">Hace 30 Minutos</span>
                </li>
                <li>
                  <h4><a href="#">La incertidumnre reina en Venezuela tras el retiro de la mitad de su dinero en efectivo</a></h4>
                  <span class="cat_name"><a href="#">Negocios</a></span>
                  <span class="date">Hace 1 Hora</span>
                </li>
                <li>
                  <h4><a href="#">Limitada actividad endustrial pese a repunte en construcci&oacute;n</a></h4>
                  <span class="cat_name"><a href="#">Dinero</a></span>
                  <span class="date">Hace 2 Horas</span>
                </li>
                <li>
                  <h4><a href="#">El d&iacute;a clave de 2016 en los mercados pas&oacute; entre el Bretix y Trump</a></h4>
                  <span class="cat_name"><a href="#">Tecnolog&iacute;a</a></span>
                  <span class="date">Hace 2 Horas</span>
                </li>
                <li>
                  <h4><a href="#">Oro se hunde ante euforia por el riesgo</a></h4>
                  <span class="cat_name"><a href="#">Noticias</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </li>
                <li>
                  <h4><a href="#">Las exportaciones de Am&eacute;rica Latina caer&aacute;n un 6%</a></h4>
                  <span class="cat_name"><a href="#">Deportes</a></span>
                  <span class="date">Hace 30 Minutos</span>
                </li>
                <li>
                  <h4><a href="#">La incertidumnre reina en Venezuela tras el retiro de la mitad de su dinero en efectivo</a></h4>
                  <span class="cat_name"><a href="#">Negocios</a></span>
                  <span class="date">Hace 1 Hora</span>
                </li>
                <li>
                  <h4><a href="#">Limitada actividad endustrial pese a repunte en construcci&oacute;n</a></h4>
                  <span class="cat_name"><a href="#">Dinero</a></span>
                  <span class="date">Hace 2 Horas</span>
                </li>
                <li>
                  <h4><a href="#">Oro se hunde ante euforia por el riesgo</a></h4>
                  <span class="cat_name"><a href="#">Noticias</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </li>
                <li>
                  <h4><a href="#">Las exportaciones de Am&eacute;rica Latina caer&aacute;n un 6%</a></h4>
                  <span class="cat_name"><a href="#">Deportes</a></span>
                  <span class="date">Hace 30 Minutos</span>
                </li>
                <li>
                  <h4><a href="#">La incertidumnre reina en Venezuela tras el retiro de la mitad de su dinero en efectivo</a></h4>
                  <span class="cat_name"><a href="#">Negocios</a></span>
                  <span class="date">Hace 1 Hora</span>
                </li>
                <li>
                  <h4><a href="#">Limitada actividad endustrial pese a repunte en construcci&oacute;n</a></h4>
                  <span class="cat_name"><a href="#">Dinero</a></span>
                  <span class="date">Hace 2 Horas</span>
                </li>
                <li>
                  <h4><a href="#">El d&iacute;a clave de 2016 en los mercados pas&oacute; entre el Bretix y Trump</a></h4>
                  <span class="cat_name"><a href="#">Tecnolog&iacute;a</a></span>
                  <span class="date">Hace 2 Horas</span>
                </li>
                <li>
                  <h4><a href="#">Oro se hunde ante euforia por el riesgo</a></h4>
                  <span class="cat_name"><a href="#">Noticias</a></span>
                  <span class="date">Hace 20 Minutos</span>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- /NEWS -->



      <!-- ARTICLE CONTAINER -->
      <section class="article_module">
        <span class="circle_icon"></span>

        <div class="wrapper_container">

          <!-- ARTICLE -->
          <article>

            <!-- Content -->
            <div class="content_holder">
              <form>
                <h3>Naque porro quiquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</h3>

                <fieldset>
                  <div class="data_holder">
                    <label for="contact_name_txt">Nombre</label>
                    <input type="text" value="" name="contact_name_txt" id="contact_name_txt" >
                  </div>

                  <div class="data_holder">
                    <label for="contact_mail_txt">Email</label>
                    <input type="email" value="" name="contact_mail_txt" id="contact_mail_txt" >
                  </div>

                  <div class="data_holder">
                    <label for="contact_comments_txt">Comentarios</label>
                    <textarea name="contact_comments_txt" id="contact_comments_txt" ></textarea>
                  </div>

                  <div class="data_holder">
                    <input type="submit" value="Enviar" name="contact_submit_btn" id="contact_submit_btn" >
                  </div>
                </fieldset>
              </form>
            </div>
            <!-- /Content -->

          </article>
          <!-- /ARTICLE -->
          
        </div>
      </section>
      <!-- /ARTICLE CONTAINER -->

<?php get_footer(); ?>