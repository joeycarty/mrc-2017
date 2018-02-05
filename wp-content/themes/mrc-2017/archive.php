<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>
		<section class="indent">
			<section>
				<h1><?php the_title(); ?></h1>
			</section>
		</section>
		
		<section class="indent">
			<section>
				<?php /* Start the Loop */
				while(have_posts()){ the_post(); ?>
					<article>
						<header>
							<h2 class="watermark-header undent"><?php the_date('M j, Y'); ?></h2>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php if(get_the_category()){ echo '<h6>'; the_category( ', ' ); echo '</h6>'; } ?>
						</header>
						<main class="post-content">
							<?php the_excerpt(); ?>		
						</main>
					</article>
				<?php } //endwhile; ?>
			</section>
		</section>

		<?php } else {
			// nothing to show...
		} // endif; ?>
<?php
get_footer();
