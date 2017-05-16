<?php
if ( $query->have_posts() ) : ?>

	<?php while( $query->have_posts() ) : $query->the_post(); ?>
	<li>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<span class="cat_name"><?= kxn_get_first_category_link($post->ID); ?></span>
		<span class="date"><?php kxn_the_time_diff(); ?></span>
	</li>
	<?php endwhile; ?>

<?php endif; ?>