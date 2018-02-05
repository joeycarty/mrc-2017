<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<section class="indent">
			<?php get_template_part( 'template-parts/section', 'hero' ); ?>

			<?php $thecontent = get_the_content(); ?>
			<?php if(!empty($thecontent)) { ?>
				<section>
					<?php the_content(); ?>		
				</section>
			<?php } // end if ?>
			
			<?php get_template_part( 'template-parts/section', 'random-project' ); ?>
		</section>

		<?php get_template_part( 'template-parts/section', 'cta' ); ?>

	<?php endwhile; // End of the loop. ?>
<?php
get_footer();
