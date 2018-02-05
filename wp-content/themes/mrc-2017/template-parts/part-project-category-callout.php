<?php // get all variables for the Single Featured Project section images
	$callout_header = get_sub_field('callout_header');
	$callout_subheader = get_sub_field('callout_subheader');
	$callout_link_text = get_sub_field('callout_link_text');
	$callout_link = get_sub_field('callout_link');
?>

<div class="split-callout">
  <div class="split-text">
    <h1 class="testimonial-quote"><?php echo $callout_header; ?></h1>
    <?php if ($callout_subheader){ ?>
	  	<p class="small"><?php echo $callout_subheader; ?></p>
	  <?php } // endif ?>  
  </div>
  <div class="split-link">
    <p><a href="<?php echo $callout_link; ?>"><?php echo $callout_link_text; ?></a></p>      
  </div>
</div>