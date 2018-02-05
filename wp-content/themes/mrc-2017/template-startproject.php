<?php
/**
 * Template Name: MRC - Start a Project
 *
 * This is the template for Careers landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */
get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<section class="indent">
			<div class="startproject-hero-wrapper">
				<?php get_template_part( 'template-parts/section', 'hero' ); ?>
				<section class="callout">
					<div>
						<a href="/why-branding-matters" target="_blank"><img src="/wp-content/uploads/2017/12/why-branding-matters-mrc-raleigh-e1513003407493.jpg"></a>
						<p><strong>Need some new art for the office?</strong><br>Get your free 11 x 17" <em>Why Branding Matters</em> poster by emailing us at <a href="mailto:hey@mrcraleigh.com?subject=Branding Matters Poster&body=My Mailing Address is:">hey@mrcraleigh.com</a>.
						</p>
					</div>
				</section>
			</div>
			
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
