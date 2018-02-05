<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			
		</section>

	<?php endwhile; // End of the loop. ?>
<?php
get_footer();
