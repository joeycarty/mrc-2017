<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MRC_2017
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<meta property="og:url" content="http://mrcraleigh.com" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/mrc-og-image.png" />
<?php get_template_part( 'template-parts/head-favicon'); ?>
<?php wp_head(); ?>

<?php $custom_styles = get_field('custom_styles', 'option'); ?>
<?php if ($custom_styles){ ?>
		<style type="text/css">
			<?php echo $custom_styles; ?>
		</style>
<?php } // endif ?>

<?php 
	// Google Search Console - Social Profile 
	// https://developers.google.com/search/docs/guides/search-gallery
?>
<span style="display:none;" itemscope itemtype="http://schema.org/Organization">
  <link itemprop="url" href="https://mrcraleigh.com">
  <a itemprop="sameAs" href="http://www.facebook.com/MRCRaleigh">FB</a>
  <a itemprop="sameAs" href="http://www.instagram.com/mrcraleigh">Instagram</a>
</span>

<?php 
	// Google Search Console - Local Businesses 
	// https://developers.google.com/search/docs/data-types/local-business
?>
<script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"ProfessionalService",
  "image": "<?php echo get_template_directory_uri(); ?>/assets/img/mrc-logo-bluebg.png",
  "@id":"https://mrcraleigh.com/",
  "name":"MRC",
  "address":{
    "@type":"PostalAddress",
    "streetAddress":"11B Glenwood Ave",
    "addressLocality":"Raleigh",
    "addressRegion":"NC",
    "postalCode":"27615",
    "addressCountry":"US"
  },
  "geo":{
    "@type":"GeoCoordinates",
    "latitude":35.781619,
    "longitude":-78.648040
  },
  "telephone":"+19192742791",
  "potentialAction":{
    "@type":"ReserveAction",
    "target":{
      "@type":"EntryPoint",
      "urlTemplate":"https://mrcraleigh.com/start-a-project",
      "inLanguage":"en-US",
      "actionPlatform":[
        "http://schema.org/DesktopWebPlatform",
        "http://schema.org/IOSPlatform",
        "http://schema.org/AndroidPlatform"
      ]
    },
    "result":{
      "@type":"Reservation",
      "name":"Start a project today!"
    }
  }
}
</script>
</head>

<body <?php body_class(); ?> id="top">
	<?php the_field('google_analytics', 'option'); ?>
	
	<header id="main-header" class="main-header">
	  <div class="header-main-area">
	    <div class="header-logo">
	      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	        <?php get_template_part( 'template-parts/image-mrc-svg'); ?>
	      </a>
	    </div>
	    <div class="trigger-menu-wrapper">
	      <div class="trigger-menu-icon">
	        <span class="menu-item-bar"></span>
	        <span class="menu-item-bar"></span>
	        <span class="menu-item-bar"></span>
	      </div>
	    </div>
	    <div class="header-nav-wrapper">
	      <nav class="header-nav">
	      	<?php wp_nav_menu( array( 
		      	'theme_location' 	=> 'header-primary', 
		      	'container'				=> false,
		      	'menu_class'			=> 'header-nav-list',
		      	'menu_id'					=> 'header-nav-list',
		      	) 
	      	); ?>
	      </nav>
	    </div>
	  </div>
	  

	  <?php 
	  	$startProjectID = 41; // the page id of /start-a-project
	  	$featuredProjectsID = 29; // the page id of /features
	  ?>
	  <div class="header-start-project-wrapper">
	   	<?php if (is_page($startProjectID)) { ?>
	   		<a href="<?php echo esc_url( get_permalink($featuredProjectsID) ); ?>" class="header-start-project">See all Project</a>
	   	<?php } else { ?>
	    	<a href="<?php echo esc_url( get_permalink($startProjectID) ); ?>" class="header-start-project">Start a Project</a>
	    <?php } ?>
	  </div>
	</header>
	<div class="main-container">