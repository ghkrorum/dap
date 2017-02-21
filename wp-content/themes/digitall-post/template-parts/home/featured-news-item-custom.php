<?php
$featuredImage = get_sub_field('featured_news_item_image');
if ( $featuredImage ) :
  $image = kxn_get_acf_image($featuredImage, '1045x697');
  $link = get_sub_field('featured_news_item_link');
  $title = get_sub_field('featured_news_item_title');
  if ($link):
    $target = ( get_sub_field('featured_news_item_new_window') ) ? '_blank' : '_self';
    $image = sprintf('<a href="%1$s" title="%2$s" target="%4$s">%3$s</a>', $link ,$title, $image, $target);
    $title = sprintf('<a href="%1$s" title="%2$s" target="%3$s">%2$s</a>', $link ,$title, $target);
  endif;
?>
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
              <?= $image; ?>
            </div>

            <!-- Info -->
            <div class="article_info">
              <h2><?= $title; ?></h2>

              <div class="meta_holder">
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</header>
<!-- /MAIN ARTICLE -->
<?php endif; ?>