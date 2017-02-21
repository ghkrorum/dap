<?php 
$itemClass = ( kxn_post_is_video() )?'video_type':'';
?>
<li class="<?= $itemClass; ?>">
  <!-- Photo -->
  <div class="photo_holder">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('960x640', array('alt' => get_the_title() )); ?></a>
  </div>
  
  <!-- Info -->
  <div class="info_holder">
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

    <div class="meta_holder">
      <span class="cat_name"><?php kxn_get_first_category_link($post->ID); ?></span>
      <span class="date"><?php kxn_the_time_diff(); ?></span>
    </div>
  </div>
</li>