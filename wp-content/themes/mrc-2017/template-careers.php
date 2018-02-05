<?php
/**
 * Template Name: MRC - Careers
 *
 * This is the template for Careers landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>
<section class="indent">
	<?php get_template_part( 'template-parts/section', 'hero' ); ?>
	<?php // get all variables for Careers Landing page.
		$job_board_watermark = get_field('job_board_watermark');
		$apply_header = get_field('apply_header');
		$apply_watermark = get_field('apply_watermark');
		$apply_introduction = get_field('apply_introduction');
		$apply_shortcode = get_field('apply_shortcode', false, false);
	?>
		<section class="job-listing">
			<div class="current-positions">
			
			<h2 class="watermark-header undent">
		  <?php if($job_board_watermark){ ?>
		  	<?php echo $job_board_watermark; ?>
		  <?php } else { ?>
		  	Word on the Street
		  <?php } //endif ?>
		  </h2>

			<?php while(have_posts()){ the_post(); ?>
			<?php
				$careersArgs = array(
					'post_type' 			=> 'careers',
					'post_status' 		=> 'publish',
					'posts_per_page' 	=> -1,
				);
				$careersQuery = new WP_Query( $careersArgs );
				if($careersQuery->have_posts()){ 
		    	while($careersQuery->have_posts()){ $careersQuery->the_post(); ?>
						
						<?php // get all variables
							$job_excerpt = get_field('job_excerpt');
							$job_benefits = get_field('job_benefits');
						?>

						<div class="job">
		          <a href="<?php the_permalink(); ?>" title="Learn more about our <?php the_title(); ?> position.">
		            <h1><?php echo the_title(); ?></h1>
		            <p><?php echo $job_excerpt; ?></p>
		          </a>
		        </div>

		  		<?php } 					// endwhile for careers query;  ?>
				
				<?php } else {			// if there are no job postings ?>
					<h1>No Specific Positions!</h1>
				<?php } 						// endif for careers query; ?>

			</div>					<?php // end .current-positions ?>	  		
    </section> 				<?php // end .job-listing ?>
    <section>
			<h2 class="watermark-header undent">
		  <?php if($apply_watermark){ ?>
		  	<?php echo $apply_watermark; ?>
		  <?php } else { ?>
		  	Reach Out
		  <?php } //endif ?>
		  </h2>

		  <h1>
			<?php if($apply_header){ ?>
		  	<?php echo $apply_header; ?>
		  <?php } else { ?>
		  	Apply
		  <?php } //endif ?>
		  </h1>

			<?php echo $apply_introduction; ?>
			
			<?php if($apply_shortcode){ ?>
		  	<?php echo do_shortcode($apply_shortcode); ?>
		  <?php } //endif ?>
		  
		</section>

		<?php get_template_part( 'template-parts/section', 'random-project' ); ?>

	<?php wp_reset_postdata(); ?>
	<?php } 									// endwhile for the main loop. ?>
</section>						<?php // end .indent ?>
<?php get_template_part( 'template-parts/section', 'cta' ); ?>
<?php
get_footer();
