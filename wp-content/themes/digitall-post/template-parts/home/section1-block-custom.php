<?php
$title = get_sub_field('block_item_title');
$posts = get_sub_field('block_item_posts');

?>
<div class="column">
  <!-- Title -->
  <h3><?= $title; ?></h3>

  <ol>
    <? 
    if ($posts) : 
      $totalPosts = count($posts);
      for ( $i = 0; $i < $totalPosts ; $i++ ) :
        $post = $posts[$i];
        $excludePostIdArray[] = $post->ID;
        setup_postdata($post);
    ?>

    <!-- Item -->
    <li>
      <!-- Photo -->
      <?php if (!$i): ?>
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
      endfor;
      wp_reset_postdata();
    endif; ?>

  </ol>
</div>