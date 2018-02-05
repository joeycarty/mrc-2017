<?php
/**
 * Template Name: MRC - Homepage - Simple
 *
 * This is the template for the MRC custom Homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>
<section class="indent">
	<?php get_template_part( 'template-parts/section', 'hero' ); ?>

	<?php while(have_posts()){ the_post(); ?>
		<?php // get all variables for the About section
			$about_header = get_field('about_header');
			$about_watermark = get_field('about_watermark');
			$about_copy = get_field('about_copy');
			$about_callout = get_field('about_callout');
			$about_image_object = get_field('about_image');	
			
			if(!empty($about_image_object)){
				$about_photo_url = $about_image_object['url'];
				$about_photo_alt = $about_image_object['alt'];
				$about_photo_title = $about_image_object['title'];
				$about_photo_caption = $about_image_object['caption'];
			}
		?>

	
		<?php // DISPLAY FEATURED PROJECTS ?>
		<?php $featured_projects = get_field('featured_projects');
			if($featured_projects){ ?>
		    <section class="projects">
			    <h2 class="watermark-header undent">Featured Projects</h2> 
		    	<div class="project-list">
				    <?php foreach( $featured_projects as $post){ // !!! variable must be called $post
			        setup_postdata($post); ?>
			        
			        <?php include( locate_template( 'template-parts/part-project-preview.php', false, false ) ); ?>

				    <?php } 			// endforeach; ?>
		    	</div>	<?php  	// .project-list ?>
		    	<p>
		    		<a href="/features/" title="See all of our featured projects">See More Featured Projects</a>
		    	</p>
		    </section><?php 	// .projects ?>

		    <?php wp_reset_postdata(); // !!! reset the $post object  ?>
		<?php } 							// endif for featured_projects ; ?>

	<?php } 								// endwhile for the main loop. ?>
</section>					<?php // end .indent ?>
<?php get_template_part( 'template-parts/section', 'cta' ); ?>
<?php
get_footer();
