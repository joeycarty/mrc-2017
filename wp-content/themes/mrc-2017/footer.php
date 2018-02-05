<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MRC_2017
 */

?>
	</div><!-- .main-container -->

	<?php // get all ACF for Contact / custom JavaScript
		$custom_scripts = get_field('custom_scripts', 'option'); 
		$phone_number = get_field('phone_number', 'option'); 
		$email_address = get_field('email_address', 'option'); 
		$mailing_address = get_field('mailing_address', 'option'); 
		$google_map_url = get_field('google_map_url', 'option'); 
		$footer_copyright_copy = get_field('footer_copyright_copy', 'option'); 
	?>

	<footer id="main-footer" class="main-footer">
	  <div class="column-wrapper">
	    <div class="column">
	      <h2>Get in Touch</h2>
	      <ul>
					<?php if($email_address){ ?>
	        	<li><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></li>
	        <?php } // endif ?>

	        <?php if($phone_number){ ?>
	        	<li><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></li>
	        <?php } // endif ?>

	        <?php if($mailing_address){ ?>
	        	<li>
	        		<?php if($google_map_url){ ?>
	        			<a href="<?php echo $google_map_url; ?>" target="_blank">
							<?php } // endif ?>
        				<?php echo $mailing_address; ?>
        			<?php if($google_map_url){ ?>
	        			</a>
							<?php } // endif ?>	
	        	</li>
	        <?php } // endif ?>
			
			<?php wp_nav_menu( array( 
		      	'theme_location' 	=> 'footer-social', 
		      	'container'			=> false,
		      	'menu_class'		=> '',
		      	'menu_id'			=> '',
		      	'items_wrap' => '%3$s'
		      	) 
	      	); ?>
	      </ul>
	      
	    </div>
	    <div class="column">
	      <h2>What We Do</h2>
	      <?php wp_nav_menu( array( 
	      	'theme_location' 	=> 'footer-services', 
	      	'container'			=> false,
	      	'menu_class'		=> '',
	      	'menu_id'			=> '',
	      	) 
      	); ?>
	    </div>
	    <div class="column">
	      <h2>Browse Around</h2>
	      <?php wp_nav_menu( array( 
	      	'theme_location' 	=> 'footer-primary', 
	      	'container'			=> false,
	      	'menu_class'		=> '',
	      	'menu_id'			=> '',
	      	) 
      	); ?>
	    </div>
	  </div>
	  <div class="copyright">
	  	&copy; <?php echo date('Y');?>
	  	<?php if($footer_copyright_copy){ ?>
      	<?php echo " - " . $footer_copyright_copy; ?>
      <?php } // endif ?>
	  </div>
	  <a href="#top" class="back-to-top" title="Ride the elevator to the top floor."></a>
	</footer>

<?php wp_footer(); ?>
<?php if ($custom_scripts){ ?>
		<script type="text/javascript">
			<?php echo $custom_scripts; ?>
		</script>
<?php } // endif ?>
</body>
</html>
