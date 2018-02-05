<?php // get all variables for featured projects
	$features_id = get_field('select_featured_project');

	$project_tagline = get_field('project_tagline', $features_id);
	$project_excerpt = get_field('project_excerpt', $features_id);
	$cover_photo_object = get_field('project_cover_photo', $features_id);	
	$project_title = get_the_title($features_id);
	$project_permalink = get_the_permalink($features_id);

	if(!empty($cover_photo_object)){
		$cover_photo_url = $cover_photo_object['sizes']['project-cover'];
		$cover_photo_alt = $cover_photo_object['alt'];
		$cover_photo_title = $cover_photo_object['title'];
		$cover_photo_caption = $cover_photo_object['caption'];
	}
?>

<section>	
	<h2 class="watermark-header undent">Featured Project</h2> 
	
	<article class="featured-project-preview">
		<div class="project-text">
		  <div class="project-name-wrapper">
		    <a href="<?php echo $project_permalink; ?>" title="See what we created for <?php echo $project_title; ?>.">
		    	<h1><?php echo $project_title; ?></h1>
		    </a>
		  </div>
		  <div class="project-details">
		    <h6><?php echo $project_tagline; ?></h6>
		    <p><?php echo $project_excerpt; ?></p>
		    <p>
		    	<a href="<?php echo $project_permalink; ?>" title="See what we created for <?php echo $project_title; ?>.">View Project</a>
		    </p>
		  </div>
		</div>
	
		<?php if(!empty($cover_photo_object)){ ?>
		<div class="project-thumbnail">
		  <a href="<?php echo $project_permalink; ?>" title="See what we created for <?php echo $project_title; ?>.">
		    <span><?php //echo $project_title; ?><p>View Project</p></span>
		    <img src="<?php echo $cover_photo_url; ?>" alt="<?php echo $cover_photo_alt; ?>">
		  </a>
		</div>
		<?php } // endif for cover photo ?>
	</article>
</section> 