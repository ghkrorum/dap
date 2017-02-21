<?php
$sectionCat = get_sub_field('block_item_cat');
if ( $sectionCat ) : 
  $catPosts = get_posts(array(
    'numberposts' => 4,
    'post_status' => 'publish',
    'category' => $sectionCat->term_id,
  ));
?>
<section id="videoLatest_module">
  <!-- Circle Icon -->
  <span class="circle_icon"></span>
  
  <div class="wrapper_container">

    <!-- Title -->
    <h3 class="cat_name"><?= esc_html( $sectionCat->name ); ?></h3>
    
    
    <ol>
      <?php if ( $catPosts ) : ?>

      <?php 
      $count = 0;
      foreach ( $catPosts as $post ): 
        $excludePostIdArray[] = $post->ID;
        setup_postdata( $post );
      ?>
      <!-- Item -->
      <li>
        <!-- Photo -->
        <div class="photo_holder">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('629x419', array('alt' => get_the_title() )); ?></a>
        </div>

        <!-- Info -->
        <div class="info_holder">
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          <div class="meta_holder">
            <span class="cat_name"><?php kxn_get_the_category_link(); ?></span>
            <span class="date"><?php kxn_the_time_diff(); ?></span>
          </div>
        </div>
      </li>
      <!-- /Item -->
      <?php 
        $count++;
      endforeach;
      ?>
      
      <?php 
        wp_reset_postdata();
      endif;
      ?>
    </ol>
    

    <!-- Button: More -->
    <a href="<?= esc_url( get_category_link( $centralCategory->term_id ) ); ?>" class="see_more">Ver M&aacute;s</a>
  </div>
</section>
<?php endif; // if ( $sectionCat ) : ?>