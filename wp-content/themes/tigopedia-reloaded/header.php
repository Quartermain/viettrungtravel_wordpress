<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php if (is_single() || is_page() || is_archive()) {wp_title(false); } else { bloginfo('name'); } ?></title>
	
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery4.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

       <?php wp_get_archives('type=monthly&format=link'); ?>
       <?php wp_head(); ?>

</head>

  <body>
     <div class="page">
	  <div class="header">   
               <div class="logo">
                    <h1><a class="blog-name" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
                    <p class="blog-description"><?php bloginfo('description'); ?></p>
                </div><!--logo-->
	  </div><!-- header -->

	  <div class="menu-bar">
	       <ul class="menu">
	           <?php if ('page' != get_option('show_on_front')) { ?>
		   <li class="<?php if ( is_home() or is_archive() or is_single() or is_paged() or is_search() or (function_exists('is_tag') and is_tag()) ) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>"><?php _e('Home'); ?></a></li>
		   <?php } ?>
		   <?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
		   <?php wp_register('<li class="admintab">','</li>'); ?>
	       </ul>
		
	       <p class="feed">
		  <a class="rss" href="feed:<?php bloginfo('rss2_url'); ?>">Blog Feed</a>
		  <a class="techno" href="http://technorati.com/faves?add=<?php bloginfo('url'); ?>">Add To Technorati</a>
	       </p>
	  </div> <!-- menu-bar -->