<?php
/**
 * The template for displaying all single Featured Project posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MRC_2017
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<section class="indent">
			<?php get_template_part( 'template-parts/section', 'hero' ); ?>

			<?php if(get_field('add_sticky_side_nav')){ ?>
				<div id="side-nav-context">
					<?php include( locate_template( 'template-parts/part-sticky-side-nav.php', false, false ) ); ?>
			<?php } // endif ?>

					<?php // ACF FLEXIBLE CONTENT 
					// check if project_categories has rows of data
					if( have_rows('project_categories') ){
				    // loop through the rows of all project categories
			    	$counter = 0;
				    while ( have_rows('project_categories') ) { the_row();
				    	// check that primary row layout is of type project_category
			        if( get_row_layout() == 'project_category' ){
			        	// check if project_category_section has rows of data
			        	if( have_rows('project_category_section') ){ ?>

						    	<section class="side-nav-follow single-project-section" id="<?php echo $counter; ?>">
							   
							    <?php	// loop through the rows of all project category sections
							    while ( have_rows('project_category_section') ) { the_row();
										// determine which type of row layout to display
										if( get_row_layout() == 'project_category_header' ){
							    		include( locate_template( 'template-parts/part-project-category-header.php', false, false ) );
							    	} elseif( get_row_layout() == 'project_category_image' ){
							    		include( locate_template( 'template-parts/part-project-category-image.php', false, false ) );
							    	} elseif( get_row_layout() == 'project_category_split_callout' ){
							    		include( locate_template( 'template-parts/part-project-category-callout.php', false, false ) );
							    	} elseif( get_row_layout() == 'project_category_mrc_quote' ){
							    		include( locate_template( 'template-parts/part-testimonial.php', false, false ) );
							    	}
 							    }	// end of project_category_section while loop; ?>

							    </section>
									
							    

								<?php
							  }		// end of project_category_section have rows conditional;		        	
			        } 		// end of project_category conditional;
			        $counter++;
			    	} 			// end of project_categories while loop;
				  } else {
				    echo '<section><h3>Nothing here, yet.</h3></section>';	
					} 				// end of project_categories conditional; ?>

			<?php if(get_field('add_sticky_side_nav')){ ?>
				</div> <?php // end of #side-nav-context ?>
			<?php } // endif ?>
			
			<?php include( locate_template( 'template-parts/section-next-project.php' ) ); ?>
		</section>

		<?php get_template_part( 'template-parts/section', 'cta' ); ?>

	<?php endwhile; // End of the loop. ?>
<?php
get_footer();
