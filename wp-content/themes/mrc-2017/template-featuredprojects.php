<?php
/**
 * Template Name: MRC - Featured Projects
 *
 * This is the template for Featured Projects landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>
<section class="indent">
	<?php get_template_part( 'template-parts/section', 'hero' ); ?>
	<?php while(have_posts()){ the_post(); ?>

		<?php if(get_field('add_sticky_side_nav')){ ?>
			<div id="side-nav-context">
				<?php include( locate_template( 'template-parts/part-sticky-side-nav.php', false, false ) ); ?>
		<?php } // endif ?>

		<?php
			$projectsArgs = array(
				'post_type' 			=> 'features',
				'post_status' 		=> 'publish',
				'posts_per_page' 	=> -1,
			);
			$projectsQuery = new WP_Query( $projectsArgs );
			if($projectsQuery->have_posts()){ ?>
				
				<section class="projects">
		    	<div class="project-list">
					
					<?php
		    	while($projectsQuery->have_posts()){ $projectsQuery->the_post(); ?>
						
						<?php include( locate_template( 'template-parts/part-project-preview.php', false, false ) ); ?>
						
		  		<?php } 				// endwhile for featured projects query;  ?>
		  		
		  		</div> 		<?php // end .project-list ?>
		    </section> 	<?php // end .projects ?>
			
			<?php } 						// endif for featured projects query; ?>
  	<?php wp_reset_postdata(); ?>

  	<?php if(get_field('add_sticky_side_nav')){ ?>
			</div> <?php // end of #side-nav-context ?>
		<?php } // endif ?>
		
	<?php } 								// endwhile for the main loop. ?>

</section>					<?php // end .indent ?>
<?php get_template_part( 'template-parts/section', 'cta' ); ?>
<?php
get_footer();
