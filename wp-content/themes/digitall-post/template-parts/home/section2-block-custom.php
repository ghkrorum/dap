<?php
$blockTitle = get_sub_field('block_item_title');
$posts = get_sub_field('block_item_posts');
$link = get_sub_field('block_item_link');
$newWindow = get_sub_field('block_item_new_window');
$target = ($newWindow)?'_blank':'_self';
?>
<section id="videoLatest_module">
  <!-- Circle Icon -->
  <span class="circle_icon"></span>
  
  <div class="wrapper_container">

    <!-- Title -->
    <h3 class="cat_name"><?= esc_html( $blockTitle ); ?></h3>
    
    
    <ol>
      <?php if ( $posts ) : ?>

      <?php 
      $count = 0;
      foreach ( $posts as $post ): 
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
    
    <?php if ($link) : ?>
    <!-- Button: More -->
    <a href="<?= esc_url( $link ); ?>" class="see_more" target="<?= $target; ?>">Ver M&aacute;s</a>
    <?php endif; ?>
  </div>
</section>
