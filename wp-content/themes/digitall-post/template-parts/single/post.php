<?
global $post;
$permalink = get_the_permalink();
$permalink = parse_url($permalink, PHP_URL_PATH);
?>
<div class="post-wrap" data-post-id="<?= $post->ID?>" data-post-title="<?php the_title(); ?>" data-post-permalink="<?= $permalink; ?>">
<header>
  <div class="wrapper">
    <div class="position">
      <div class="slider">

        <!-- Top Article -->
        <div class="main_holder">
          <div class="content">

            <!-- Photo-->
            <div class="photo_holder">
              
              <a><?php the_post_thumbnail( '1045x697' ); ?></a>
              
            </div>

            <!-- Info -->
            <div class="article_info">
              <h2><?php the_title(); ?></h2>


              <div class="meta_holder">
                <span class="cat_name"><?= kxn_get_first_category_link( $post->ID ); ?></span>
                <span class="date"><?php kxn_the_time_diff(); ?></span>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</header>
<section class="article_module">
  <span class="circle_icon"></span>
  <div class="wrapper_container">
    <article>

      <?php

      $authorThumb = '';
      $authorName = '';
      $twitterName = '';

      $author = get_field('acf_author');
      if ( $author ):
        $currentPost = $post;
        $post = $author[0];
        setup_postdata($post);
        
        $twitterName = '';
        $authorName = get_the_title();
        $twitter = get_field('acf_twitter');
        $twitterUrl = '';
        if ( $twitter ){
          $twitterUrl = 'https://twitter.com/'.$twitter;
        }

        $authorThumb = get_the_post_thumbnail($post->ID, 'author_thumb');
        if ( $twitterUrl ){
          $format = '<a href="%1$s" target="_blank">%2$s</a>';
          $authorThumb = sprintf( $format, $twitterUrl, $authorThumb );
          $authorName = sprintf( $format, $twitterUrl, $authorName );
          $twitterName = sprintf( '<a href="%1$s" target="_blank"><span>@%2$s</span></a>', $twitterUrl, $twitter );
          
        }
        

      ?>
      <!-- Author -->
      <div class="author_holder">
        <div class="photo_holder">
          <?= $authorThumb; ?>
        </div>
        <p>Por: <a href=""><?= $authorName; ?></a> <?= $twitterName ?></p>
      </div>
      <!-- /Author -->
      <?php 
        $post = $currentPost;
        setup_postdata($post);
      endif; ?>


      

      <!-- Content -->
      <div class="content_holder">
        <?php echo do_shortcode('[ssbp title="'.get_the_title().'" url="'.get_permalink().'"]'); ?>
        <?php
        if ( in_category( 'x-plainers' ) ) :
        ?>

        <?php
        if ( have_rows('acf_topics') ) :
          while( have_rows('acf_topics') ) : the_row();

        ?>
        <h1><?php the_sub_field('acf_topic_title'); ?></h1>
        <?php the_sub_field('acf_topic_content'); ?>
        <?php 
          endwhile;
        endif; ?>
        
        <?php else : ?>

        <?php the_content(); ?>

        <?php 
        endif;
        ?>
        <?php echo do_shortcode('[ssbp title="'.get_the_title().'" url="'.get_permalink().'"]'); ?>
      </div>
      <!-- /Content -->

      <!-- Tags -->
      <?php
      $tags = kxn_get_tag_links();
      if ($tags) :
      ?>
      <div class="tags_holder">
        Tags: 
        <ol>
          <?php foreach ( $tags as $tag ) : ?>
          <li><?= $tag; ?></li>
          <?php endforeach; ?>
        </ol>
      </div>
      <?php endif;?>
      <!-- /Tags -->

      <?php
      if ($authorName):
      ?>
      <!-- Author -->
      <div class="author_holder">
        <div class="photo_holder">
          <?= $authorThumb; ?>
        </div>
        <p>Por: <?= $authorName; ?> <?= $twitterName; ?></p>
      </div>
      <!-- /Author -->
      <?php endif; ?>


      
    </article>
    <!-- /ARTICLE -->
  </div>
</section>
</div>