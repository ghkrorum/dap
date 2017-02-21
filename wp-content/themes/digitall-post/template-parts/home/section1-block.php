<?php
$sectionCat = get_sub_field('block_item_cat');
$termLink = get_category_link( $sectionCat->term_id );
$sectionCatPosts = get_posts(array(
  'numberposts' => 4,
  'post_status' => 'publish',
  'category' => $sectionCat->term_id,
  // 'exclude' => $excludePostIdArray,
));

?>
<div class="column">
  <!-- Title -->
  <h3><a href="<?= $termLink; ?>"><?= $sectionCat->name; ?></a></h3>

  <ol>
    <?php 
    if ($sectionCatPosts) : 
      $count = 0;
      foreach ( $sectionCatPosts as $post ) : 
        $excludePostIdArray[] = $post->ID;
        setup_postdata($post);
    ?>
    <!-- Item -->
    <li>
      <!-- Photo -->
      <?php if (!$count): ?>
      <div class="photo_holder">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('300x200', array('alt' => get_the_title() )); ?></a>
      </div>
      <?php endif; ?>
      
      <!-- Info -->
      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <span class="date"><?php kxn_the_time_diff(); ?></span>
    </li>
    <!-- /Item -->
    <?php 
        $count++;
      endforeach;
      wp_reset_postdata();
    endif;
    ?>

  </ol>
</div>