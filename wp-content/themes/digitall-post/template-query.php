<?php
/*
Template Name: Query
*/
get_header();

global $wpdb;

$countPostsQuery = <<<SQL
select DATE_FORMAT(post_date, '%Y') as year,
DATE_FORMAT(post_date, '%m') as month,
COUNT(ID) as total
from wp_posts
where post_type = 'post' and post_status = 'publish'
group by DATE_FORMAT(post_date, '%Y%m');
SQL;


$countPostsResult = $wpdb->get_results( $countPostsQuery, OBJECT );


$countAttachmentsQuery = <<<SQL
select DATE_FORMAT(post_date, '%Y') as year,
DATE_FORMAT(post_date, '%m') as month,
COUNT(ID) as total
from wp_posts
where post_type = 'attachment' 
group by DATE_FORMAT(post_date, '%Y%m')
SQL;


$countAttachmentsResult = $wpdb->get_results( $countAttachmentsQuery, OBJECT );

?>
<style>
th, td {
	padding: 15px;
}
</style>
    <div id="main_container" class="fluid_container">
	<h1>Posts</h1>
	<table>	
	<?php
	

	foreach ($countPostsResult as $row){
	?>
	<tr>
		<td>
			<?= $row->year; ?>
		</td>
		<td>
			<?= $row->month; ?>
		</td>
		<td>
			<?= $row->total; ?>
		</td>
	</tr>
	<?php 
	}

	?>
	</table>


	<h1>Attachments</h1>
	<table>	
	<?php
	

	foreach ($countAttachmentsResult as $row){
	?>
	<tr>
		<td>
			<?= $row->year; ?>
		</td>
		<td>
			<?= $row->month; ?>
		</td>
		<td>
			<?= $row->total; ?>
		</td>
	</tr>
	<?php 
	}

	?>
	</table>
      
    </div>
<?php get_footer(); ?>