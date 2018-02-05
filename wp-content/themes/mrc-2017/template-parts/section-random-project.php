<?php
$projectsArgs = array(
	'post_type' 			=> 'features',
	'post_status' 		=> 'publish',
	'posts_per_page' 	=> 1,
	'orderby'					=> 'rand',
);
$projectsQuery = new WP_Query( $projectsArgs );
if($projectsQuery->have_posts()){ ?>
	
	<section>	
		<h2 class="watermark-header undent">Featured Project</h2> 
		
		<?php
  	while($projectsQuery->have_posts()){ $projectsQuery->the_post(); ?>
			<?php include( locate_template( 'template-parts/part-project-preview.php', false, false ) ); ?>
		<?php } 				// endwhile for featured projects query;  ?>
  </section> 	<?php // end section ?>

<?php } 						// endif for featured projects query; ?>