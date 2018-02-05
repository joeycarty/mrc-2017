<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MRC_2017
 */

get_header(); ?>
	<section class="indent">
		<section>
			<h6 class="watermark-header undent">Go Back To All Of</h6>
			<h3 class="undent"><a href="<?php the_permalink(847); ?>" title="Back to all posts"><?php echo get_the_title(847); ?></a></h3>
		</section>
	</section>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			// this thumbnail variable and the following script are for Google Search Console Structured Data for Articles
			// https://developers.google.com/search/docs/data-types/article
			$thumbnail_url = get_template_directory_uri() . '/assets/img/mrc-og-image.png';
			if(get_the_post_thumbnail()){ 
				$thumbnail_url = the_post_thumbnail_url(); 
			}  
		?>
		<script type="application/ld+json">
		{
		  "@context": "http://schema.org",
		  "@type": "NewsArticle",
		  "mainEntityOfPage": {
		    "@type": "WebPage",
		    "@id": "<?php the_permalink(); ?>"
		  },
		  "headline": "<?php the_title(); ?>",
		  "image": "<?php echo $thumbnail_url; ?>",
		  "datePublished": "<?php the_date('Y-m-d'); ?>",
		  "dateModified": "<?php the_modified_date('Y-m-d'); ?>",
		  "author": {
		    "@type": "Person",
		    "name": "<?php the_author(); ?>"
		  },
		   "publisher": {
		    "@type": "Organization",
		    "name": "MRC",
		    "logo": {
		      "@type": "ImageObject",
		      "url": "<?php echo get_template_directory_uri(); ?>/assets/img/mrc-logo-bluebg.png"
		    }
		  },
		  "description": "<?php the_excerpt(); ?>"
		}
		</script>

		<section class="indent">
			<section>
				<header>
					<h2 class="watermark-header undent"><?php the_date('M j, Y'); ?></h2>
					<h1><?php the_title(); ?></h1>
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
					<?php the_content(); ?>		
				</main>
				<?php if(get_the_category()){ echo '<p class="categories"><span>Tags </span>'; the_category( ', ' ); echo '</p>'; } ?>
			</section>
		</section>

		<section class="indent">
			<section>
				<h6 class="watermark-header undent">Additional Thoughts</h6>
				<?php //the_post_navigation(); ?>
				<?php the_post_navigation( array(
            'prev_text'                  => __( '%title' ),
            'next_text'                  => __( '%title' ),
            'screen_reader_text' => __( 'Continue Reading' ),
        ) ); ?>
			</section>
		</section>

	<?php endwhile; // End of the loop. ?>
<?php
get_footer();
