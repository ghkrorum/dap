<?php
/*
Template Name: Explainer
*/
get_header();
the_post();
?>
    <div id="main_container" class="fluid_container">

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
                    <a href="#"><img src="<?= THEME_URL; ?>/images/home/explainer_header.jpg" alt="Bosa y bancos Mexicanos cerrados por feriado"></a>
                  </div>

                  <!-- Info -->
                  <div class="article_info">
                    <h2><a href="#">5 cosas que deberías de saber par entender
quien  fué Fidel Castro</a></h2>

                    <div class="meta_holder">
                      <span class="cat_name"><a href="#">Noticias</a></span>
                      <span class="date">Hace 20 Minutos</span>
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
      <?php include('_last-news.php'); ?>
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
              <h1>1 - En 1955, Castro viajó con su hermano Raúl a México</h1>
              <img src="<?= THEME_URL; ?>/images/home/explainer_content_1.jpg" alt="" >
              <p>donde se reunió con otros cubanos revolucionarios en el exilio, incluyendo a Ernesto “Che” Guevara. El año siguiente, el grupo regresó a Cuba para instigar la destitución del gobierno de Batista. La insurgencia de Castro tuvo éxito en 1959, y fue puesto como primer ministro de Cuba. Unos meses después, él implementó políticas “socialistas” que fueron similares a aquellas en países comunistas.</p>

              <h1>2 - En 1962  aún declaraba a su país como un mero estado socialista</h1>
              <img src="<?= THEME_URL; ?>/images/home/explainer_content_2.jpg" alt="" >
              <p>Castro trabajó con Nikita Khrushchev, líder de la Unión Soviética, en un plan para instalar armas nucleares soviéticas en el suelo cubano. Cuando un reconocimiento aéreo las detectó, se detonó el conflicto de 13 días (de octubre 16 al 28) entre los Estados Unidos y la Unión Soviética, conocido como la Crisis de los Misiles en Cuba. Castro quería que Khrushchev amenazara con el uso de las armas nucleares si Estados Unidos atacaba a Cuba, pero el líder soviético se negó y terminó concediendo las demandas de Estados Unidos de remover todos los misiles de la isla.</p>

              <h1>3 - En 1965, Castro unió el Partido Comunista de Cuba con sus propias Organizaciones Revolucionariasquia consequuntur magni dolores</h1>
              <img src="<?= THEME_URL; ?>/images/home/explainer_content_3.jpg" alt="" >
              <p>Integradas y se colocó a sí mismo como líder del partido. Este movimiento hizo oficialmente de Cuba el primer país comunista del hemisferio occidental. Por los próximos años, Castro fundó varias organizaciones para promover la revolución y el comunismo a través de África, Asia, y Latinoamérica. </p>

              <h1>4 - Estados Unidos tuvo una política de derrocar a Castro</h1>
              <img src="<?= THEME_URL; ?>/images/home/explainer_content_4.jpg" alt="" >
              <p>Durante las administraciones de Eisenhower y Kennedy, el gobierno de los Estados Unidos tuvo una política de derrocar a Castro (incluyendo la fallida Invasión de Bahía de Cochinos, liderada por exiliados cubanos respaldados por EE. UU.). La CIA también intentó asesinar a Castro varias veces. El gobierno cubano declaró que se había atentado 638 veces contra la vida de Castro, pero el Comité Selecto del Senado de los Estados Unidos para el Estudio de las Operaciones Gubernamentales Respecto a las Actividades de Inteligencia (el comité Church) comprobó que se habían realizado ocho intentos de asesinato entre 1960 y 1965.</p>

              <h1>5 - El pueblo cubano enfrentó muchas restricciones y violaciones de los derechos humanos.</h1>
              <img src="<?= THEME_URL; ?>/images/home/explainer_content_5.jpg" alt="" >
              <p>De acuerdo a Human Rights Watch, los ciudadanos cubanos han sido sistemáticamente privados de sus derechos fundamentales de libre expresión, privacidad, asociación, asamblea, y procesos legales aptos. </p>

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


            <!-- TRENDING -->
            <div class="latest_holder module">
              <!-- Title -->
              <h3 class="cat_name">Trending</h3>

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

                <li class="video_type">
                  <div class="photo_holder">
                    <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_6.jpg" alt=""></a>
                  </div>
                  
                  <div class="info_holder">
                    <h4><a href="#">Casa Blanca refuta crítica de Trump sobre supuesto ‘hackeo’ ruso</a></h4>

                    <div class="meta_holder">
                      <span class="cat_name"><a href="#">Internacional</a></span>
                      <span class="date">Hace 2 Horas</span>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="photo_holder">
                    <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_7.jpg" alt=""></a>
                  </div>
                  
                  <div class="info_holder">
                    <h4><a href="#">¿Qué problemas sociales ocurren en las escuelas?</a></h4>

                    <div class="meta_holder">
                      <span class="cat_name"><a href="#">+M&aacute;s</a></span>
                      <span class="date">Hace 2 Horas</span>
                    </div>
                  </div>
                </li>

                <li class="video_type">
                  <div class="photo_holder">
                    <a href="#"><img src="<?= THEME_URL; ?>/images/home/latest_9.jpg" alt=""></a>
                  </div>
                  
                  <div class="info_holder">
                    <h4><a href="#">El mayor reto del nuevo jefe de Coca-Cola eres tú, millennial</a></h4>

                    <div class="meta_holder">
                      <span class="cat_name"><a href="#">Noticias</a></span>
                      <span class="date">Hace 4 Horas</span>
                    </div>
                  </div>
                </li>
              </ol>
            </div>
            <!-- /TRENDING -->
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
<?php get_footer(); ?>