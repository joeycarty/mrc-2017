<?php
/**
 * Template Name: Blog
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>

		<section class="indent">
			<section>
				<h6 class="watermark-header undent">Welcome to</h6>
				<h3 class="undent"><?php the_title(); ?></h3>
			</section>
		</section>
		
		<?php 
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			$the_query = new WP_Query( array(
				'post_type' 		=> 'post',
				'post_per_page' => 10,
				'paged'						=> $paged,
			)); 
		?>
		<?php if($the_query->have_posts()){ ?>

		<section class="indent blog-archive">
			<section>
				<?php /* Start the Loop */
				while($the_query->have_posts()){ $the_query->the_post(); ?>
					<article>
						<header>
							<h2 class="watermark-header undent"><?php the_date('M j, Y'); ?></h2>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<div class="author">
								<?php if(get_avatar(get_the_author_meta('user_email'))){ ?>
									<div class="author-image">
										<?php echo get_avatar(get_the_author_meta('user_email'), $size = '50'); ?>
									</div>
								<?php } ?>
								<h6>
									<?php the_author(); ?>, <em><?php the_author_meta('nickname') ?></em>
								</h6>
							</div>
						</header>
						<main class="post-content">
							<?php the_excerpt(); ?>
							<p><a href="<?php the_permalink(); ?>">Read More ››</a></p>	
						</main>
						<?php if(get_the_category()){ echo '<p class="categories"><span>Tags </span>'; the_category( ', ' ); echo '</p>'; } ?>
					</article>
				<?php } //endwhile; ?>
			</section>
		</section>
		
		<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
			<section class="indent">
	  		<section>
	  			<nav class="navigation post-navigation" role="navigation">
	  				<div class="nav-links">
		  				<div class="nav-previous"><?php echo get_previous_posts_link( 'Newer Thoughts'); ?></div>
			  			<div class="nav-next"><?php echo get_next_posts_link( 'Older Thoughts', $the_query->max_num_pages ); ?></div>
		  			</div>
	  			</nav>
	  		</section>
  		</section>
		<?php } ?>


		<?php } else {
			// nothing to show...
		} // endif; ?>
<?php
get_footer();
