<?php
/**
 * Template Name: MRC - Adwords
 *
 * This is the template for Archvied Projects.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<?php $services_landing_id = 635; ?>
		
		<section class="indent">
			<p class="back-button small"><a href="<?php echo get_permalink( $services_landing_id ); ?>">‹‹ All Services</a></p>
			<?php get_template_part( 'template-parts/section', 'hero' ); ?>

			<?php $thecontent = get_the_content(); ?>
			<?php if(!empty($thecontent)) { ?>
				<section>
					<?php the_content(); ?>		
				</section>
			<?php } // end if ?>
			
			<?php get_template_part( 'template-parts/section', 'specific-project' ); ?>
		</section>

		<?php //get_template_part( 'template-parts/section', 'cta' ); ?>

	<?php endwhile; // End of the loop. ?>
<?php
get_footer();
