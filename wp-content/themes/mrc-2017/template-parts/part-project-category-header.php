<?php // get all variables for the Single Featured Project section heading
	$id = get_sub_field('project_category_id');
	$heading = get_sub_field('project_category_heading');
	$introduction = get_sub_field('project_category_introduction');
?>
<?php if($heading){ ?>
	<h1><?php echo $heading; ?></h1>
<?php } ?>
<?php if($heading){ ?>
	<p><?php echo $introduction; ?></p>
<?php } ?>