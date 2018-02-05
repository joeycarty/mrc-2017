<?php // get all variables for the Single Featured Project section images
	$image_object = get_sub_field('image');
	$caption = get_sub_field('caption');

	if(!empty($image_object)){
		$image_alt = $image_object['alt'];
		// $image_url = $image_object['sizes']['project-cover'];
		$image_url = $image_object['url'];
	}
?>

<div class="project-image">
  <div class="project-thumbnail">
    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
  </div>
  <?php if ($caption){ ?>
  	<p><?php echo $caption; ?></p>
  <?php } // endif ?>
</div>
