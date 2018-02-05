<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MRC_2017
 */
get_header(); ?>
		<section class="indent">
			<section class="hero">
				<h2 class="watermark-header undent">Whoops!</h2>		
				<h1 class="undent">404 Error</h1>	
				<p>Something went wrong. Don't beat yourself up over it.</p>
			</section>

			<?php get_template_part( 'template-parts/section', 'random-project' ); ?>
		</section>

		<?php get_template_part( 'template-parts/section', 'cta' ); ?>
<?php
get_footer();
