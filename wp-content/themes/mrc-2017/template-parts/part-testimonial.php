<?php // get all variables for the testimonial
	$name = get_field('client_name');
	$job_title = get_field('client_job_title');
	$watermark = get_field('client_watermark');
	$testimonial = get_field('client_testimonial');
	$headshot_object = get_field('headshot_portrait');

	if(!empty($headshot_object)){
		$headshot_alt = $headshot_object['alt'];
		$headshot_title = $headshot_object['title'];
		$headshot_caption = $headshot_object['caption'];
		$headshot_url = $headshot_object['sizes']['testimonial-headshot'];
	}
?>

<?php // get all variables for the testimonial on Single Featured Project post
	if(is_singular( 'features' )){
		$name = get_sub_field('client_name');
		$job_title = get_sub_field('client_job_title');
		$watermark = get_sub_field('client_watermark');
		$testimonial = get_sub_field('client_testimonial');
		$headshot_object = get_sub_field('headshot_portrait');

		if(!empty($headshot_object)){
			$headshot_alt = $headshot_object['alt'];
			$headshot_title = $headshot_object['title'];
			$headshot_caption = $headshot_object['caption'];
			$headshot_url = $headshot_object['sizes']['testimonial-headshot'];
		}
	}
?>

<?php // if testimonial is shown on the homepage, use 'section' html element. Otherwise use 'div'
	$htmlElement = 'div';
	if(is_page_template( 'template-homepage.php' )){
		$htmlElement = 'section';
	} // endif 
?>

<<?php echo $htmlElement; ?> class="testimonial">
  <h2 class="watermark-header undent">
  <?php if($watermark){ ?>
  	<?php echo $watermark; ?>
  <?php } else { ?>
  	Word on the Street
  <?php } //endif ?>
  </h2>

	<?php if($testimonial){ ?>
  	<h1 class="testimonial-quote">&ldquo;<?php echo $testimonial; ?>&rdquo;</h1>
  <?php } //endif ?>
	
	<?php if($name || $job_title){ ?>
  	<p class="small">

  		<?php if($headshot_object){ ?>
			<span class="testimonial-headshot">
        <img src="<?php echo $headshot_url; ?>" alt="<?php echo $headshot_alt; ?>">
      </span>
			<?php } else { ?>
			-	 
			<?php } //endif ?>

			<?php if($name & $job_title){ ?>
				<?php echo $name; ?>, <?php echo $job_title; ?>
      <?php } else if($name && !$job_title){ ?>
				<?php echo $name; ?>
      <?php } else if(!$name && $job_title){ ?>
				<?php echo $job_title; ?>
      <?php } //endif ?>
  	</p>
  <?php } //endif ?>
</<?php echo $htmlElement; ?>>