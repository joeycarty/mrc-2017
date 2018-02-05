<?php
/**
 * The template for displaying single Career Job Listing posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MRC_2017
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php // get all variables
			$job_description = get_field('job_description');
			$app_shortcode = get_field('application_form_shortcode', false, false);

			// career landing variables that are needed on single posts
			$career_landing_ID = 46;
			$apply_header = get_field('apply_header', $career_landing_ID);
			$apply_watermark = get_field('apply_watermark', $career_landing_ID);
			$apply_introduction = get_field('apply_introduction', $career_landing_ID);
			$fallback_app_shortcode = get_field('apply_shortcode', $career_landing_ID, false, false);
		?>
		<?php 
			// the following script is for Google Search Console Structured Data for Job Postings
			// https://developers.google.com/search/docs/data-types/article
		?>
		<script type="application/ld+json"> {
		  "@context" : "http://schema.org/",
		  "@type" : "JobPosting",
		  "title" : "<?php the_title(); ?>",
		  "description" : "<?php echo $job_description; ?>",
		  "datePosted" : "<?php the_date('Y-m-d'); ?>",
		  "hiringOrganization" : {
		    "@type" : "Organization",
		    "name" : "MRC",
		    "sameAs" : "https://mrcraleigh.com",
		    "logo" : "<?php echo get_template_directory_uri(); ?>/assets/img/mrc-logo-bluebg.png"
		  },
		  "jobLocation" : {
		    "@type" : "Place",
		    "address" : {
		      "@type" : "PostalAddress",
		      "streetAddress" : "11B Glenwood Ave",
		      "addressLocality" : "Raleigh",
		      "addressRegion" : "NC",
		      "postalCode" : "27615",
		      "addressCountry": "US"
		    }
		  }
		}
		</script>
		
		

		<section class="indent">
			<?php get_template_part( 'template-parts/section', 'hero' ); ?>
			
			<?php if($job_description){ ?>
				<section>
					<?php echo $job_description; ?>	
				</section>
			<?php } //endif ?>

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
			
				<?php if ($app_shortcode){ ?>
					<?php echo do_shortcode($app_shortcode); ?>							
				<?php } else { ?>
					<?php echo do_shortcode($fallback_app_shortcode); ?>
				<?php } //endif ?>
			</section>
			
			<?php get_template_part( 'template-parts/section', 'random-project' ); ?>
		</section>

		<?php get_template_part( 'template-parts/section', 'cta' ); ?>

	<?php endwhile; // End of the loop. ?>
<?php
get_footer();
