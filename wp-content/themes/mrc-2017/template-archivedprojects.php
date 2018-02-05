<?php
/**
 * Template Name: MRC - Archived Projects
 *
 * This is the template for Archvied Projects.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRC_2017
 */

get_header(); ?>
<section class="indent">
	<?php get_template_part( 'template-parts/section', 'hero' ); ?>
	<?php while(have_posts()){ the_post(); ?>
		<?php $countForIDs = 0; ?>
		
		<?php if(get_field('add_sticky_side_nav')){ ?>
			<div id="side-nav-context">
				<?php include( locate_template( 'template-parts/part-sticky-side-nav.php', false, false ) ); ?>
		<?php } // endif ?>
		
		<?php // check if the archvie section repeater has any rows
		if( have_rows('archived_section') ){
		  $countForSections = 0; // matches up with sticky-side-nav anchors

		  while ( have_rows('archived_section') ) { the_row();
				$sectionYear = get_sub_field('year');
				$description = get_sub_field('description'); ?>

				<section class="side-nav-follow archive-section" id="<?php echo $countForSections; ?>">
					<?php $countForSections++; ?>
			  	<h1><?php echo $sectionYear; ?></h1>
			    <?php if($description){ ?><h6><?php echo $description; ?></h6><?php } ?>
				 	
				 	<div class="column-wrapper flex">
				 		<?php 
				 			$archivedArgs = array(
								'post_type' 			=> 'archive',
								'post_status' 		=> 'publish',
								'posts_per_page' 	=> -1,
								'meta_key'		=> 'year',
								'meta_value'	=> $sectionYear
							);
							$archiveSectionQuery = new WP_Query( $archivedArgs );
			 		 	?>
						<?php while($archiveSectionQuery->have_posts()){ $archiveSectionQuery->the_post(); ?>
								<?php // get fields for individual archived project post
									$services = get_field('services');
									$client = get_field('client');
									$year = get_field('year');
									$photo_object = get_field('photo');
									$countForIDs++;

									if(!empty($photo_object)){
										$photo_thumb_url = $photo_object['sizes']['project-small'];
										$photo_full_url = $photo_object['url'];
										$photo_alt = $photo_object['alt'];
									}
								?>

								<article class="archived-project">
			            <a class="popup-gallery" title="<?php the_title(); ?>" href="#archive-<?php echo $countForIDs; ?>">
			              <img src="<?php echo $photo_thumb_url; ?>" alt="<?php echo $photo_alt; ?>">
			            </a>
			            <div class="archive-popup" id="archive-<?php echo $countForIDs; ?>">
			              <h1><?php echo $year; ?></h1>
			              <div class="archive-full">
			                <img src="<?php echo $photo_full_url; ?>" alt="<?php echo $photo_alt; ?>">
			              </div>
			             	
			             	<?php if ($services || $client){ ?>
			              <div class="archive-details">
			                <?php if ($services){ ?>
			                	<h6>Services</h6>
			                	<p><?php echo $services; ?></p>
			                <?php } // endif services ?>
											<?php if ($client){ ?>
			                	<h6>Client</h6>
			                	<p><?php echo $client; ?></p>
			                <?php } // endif client ?>
			              </div>
			              <?php } // endif details ?>
			            </div>
			          </article>
			  			<?php } 			// endwhile for archived projects query;  ?>
				  		
			 		 	<?php wp_reset_postdata(); ?>
					</div> <!-- end of .column-wrapper -->
				</section>
		  <?php   
		  } // have_rows endwhile;
		} // have_rows endif;
		?>

  	<?php wp_reset_postdata(); ?>
  	<?php if(get_field('add_sticky_side_nav')){ ?>
			</div> <?php // end of #side-nav-context ?>
		<?php } // endif ?>

	<?php } // endwhile for the main loop. ?>

</section> <?php // end .indent ?>
<?php get_template_part( 'template-parts/section', 'cta' ); ?>
<?php
get_footer();
