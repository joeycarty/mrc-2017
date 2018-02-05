<section class="cta">
	<h1>
	<?php if(is_singular( 'careers' )){ ?>
		<a href="/careers" class="cta-link">See all Careers</a>		
	<?php } elseif(is_page_template( 'template-careers.php' ) || is_page(41)){ ?>
		<a href="/features" class="cta-link">See all Projects</a>		
	<?php } else { ?>
		<a href="/start-a-project" id="cta-startproject" class="cta-link">Start a Project</a>
	<?php } // endif ?>
	</h1>
</section>