<?php 
// if we're currently on a Single Project Post page, this will
// set the correct Project to be shown for the 'Next Project' section.
// Otherwise, the current Project in the loop's ID is used.
$features_id = get_the_ID();

if(is_singular( 'features' )){
	// if there is a Next post, use that ID
	if(get_previous_post()) {
		$features_id = get_previous_post()->ID;
	} 
	// if current post is the last post, get the first post
	else {
		$first = new WP_Query('posts_per_page=1&order=DESC&post_type=features&post_status=publish'); 
		$features_id = $first->posts[0]->ID;
  	wp_reset_query();
	}
} // endif 
?>

<?php // get all variables for featured projects
	$services_provided = get_field('services_provided', $features_id);
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

<article class="featured-project-preview">
	<div class="project-text">
	  <div class="project-name-wrapper">
	    <a href="<?php echo $project_permalink; ?>" title="See what we created for <?php echo $project_title; ?>.">
	    	<h1><?php echo $project_title; ?></h1>
	    	<?php if(!empty($services_provided)){ ?><p class="categories"><?php echo implode(', ', $services_provided); ?></p><?php } ?>
	    </a>
	  </div>
	  <div class="project-details">
	    <h6 class="project-tagline"><?php echo $project_tagline; ?></h6>
	    <p class="project-excerpt"><?php echo $project_excerpt; ?></p>
	    <p class="project-viewlink">
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