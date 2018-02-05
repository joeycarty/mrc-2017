<?php // get all variables
	$hero_watermark = get_field('hero_watermark');
	$hero_title = get_field('hero_title');
	$hero_description = get_field('hero_description');	

	$project_tagline = get_field('project_tagline');
	$project_excerpt = get_field('project_excerpt');
	$project_intro = get_field('project_intro');
	$services_provided = get_field('services_provided');

	$job_excerpt = get_field('job_excerpt');

	$contact_page_id = 48;
	$phone_number = get_field('phone_number', 'option'); 
	$email_address = get_field('email_address', 'option'); 
	$mailing_address = get_field('mailing_address', 'option'); 
	$google_map_url = get_field('google_map_url', 'option');
?>

<section class="hero">
	<?php if(is_page_template( 'template-homepage.php' ) || is_page_template( 'template-homepage-simple.php' )){ 
		get_template_part( 'template-parts/image', 'mrc-svg' );
	} else { ?>
		<h2 class="watermark-header undent">
			<?php if ($hero_watermark){
				echo $hero_watermark;	
			} elseif(is_singular( 'features' )){
				echo 'Featured Project';
			} elseif(is_singular( 'careers' )){
				echo 'Join the Team';
			} ?>
		</h2>
	<?php } // endif ?>

	<h1 class="undent">
		<?php if ($hero_title){
			echo $hero_title;
		} else {
			the_title();
		} // endif ?>
	</h1>

	<div class="hero-intro-wrapper">
		<?php if(is_singular( 'features' )){ ?>
			<h6><?php echo $project_tagline; ?></h6>
	
			<?php if($project_intro){ ?>		
			<?php echo $project_intro; ?>
			<?php } else { ?>
			<p><?php echo $project_excerpt; ?></p>
			<?php } ?>
			<?php if(!empty($services_provided)){ ?>
				<div class="categories"><?php echo implode(', ', $services_provided); ?></div>
			<?php } ?>
		<?php } elseif(is_singular( 'careers' )){ ?>
			<p><?php echo $job_excerpt; ?></p>
		<?php } else { ?>
			<p><?php echo $hero_description; ?></p>			
		<?php } // endif ?>
	</div>

	<?php if(is_page($contact_page_id)) { ?>
		<div class="contact-info">
		<?php if($email_address){ ?>
    	<h6>Email</h6>
    	<p><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></p>
    <?php } // endif ?>

    <?php if($phone_number){ ?>
    	<h6>Phone</h6>
    	<p><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></p>
    <?php } // endif ?>

    <?php if($mailing_address){ ?>
    	<h6>Address</h6>
  		<?php if($google_map_url){ ?>
  			<p><a href="<?php echo $google_map_url; ?>" target="_blank">
			<?php } // endif ?>
				<?php echo $mailing_address; ?>
			<?php if($google_map_url){ ?>
  			</a></p>
			<?php } // endif ?>	
    <?php } // endif ?>
    </div>
	<?php } // endif ?>

	<?php //if(is_page_template( 'template-featuredprojects.php' )){ ?>
		<?php //get_template_part( 'template-parts/part', 'toggle-projects' ); ?>
	<?php //} // endif ?>
</section>