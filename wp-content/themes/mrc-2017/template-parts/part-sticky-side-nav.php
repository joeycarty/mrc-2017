<?php
// check if the repeater field has rows of data
if( have_rows('nav_item') ){  
	$navCounter = 0; 
	?>
	<nav class="side-nav" id="side-nav">
		<ul>
		 	<?php while ( have_rows('nav_item') ) { the_row(); 
				// $anchor = get_sub_field('anchor');
				$title = get_sub_field('title');
	 		?>	
			<li><a href="#<?php echo $navCounter; ?>"><?php echo $title; ?></a></li>
		  <?php 
		  $navCounter++;
		  } // endwhile; ?>
	  </ul>
	</nav>
<?php } // end if ?>


    


