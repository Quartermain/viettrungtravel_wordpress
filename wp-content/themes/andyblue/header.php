<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>

<?php if ( is_home() ) : ?><title><?php bloginfo('name'); ?></title><meta name="keywords" content="italiasw, italia sw, www.italiasw.com, recensioni, web2, web 2, apps, applicativi, software, windows, windows xp, windows vista, vista, ict, recensioni ict, recensioni software, news, news high tech, blog italia, blog software, italia software, sw, blog informatica, news informatica, articoli informatica, recensioni web 2.0" /><meta name="description" content="<?php bloginfo('description'); ?>" />
<?php endif ;?><?php if ( is_single()) { ?><title><?php the_title(); ?> &raquo; <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_search()) { ?><title>Search Result</title><?php } ?><?php if ( is_archive()) { ?><title><?php single_cat_title(); ?> &raquo; <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_page()) { ?><title><?php the_title(); ?> &raquo; <?php bloginfo('name'); ?></title><?php } ?><?php if ( is_404()) { ?><title>Error 404, Page not Found &raquo; <?php bloginfo('name'); ?></title><?php } ?>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery4.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

	<?php wp_head(); ?>
</head>
<body>
<div id="Wrapper">
	<div id="UIHeader">	
<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8.0.22.0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" height="242" width="1000"><param name="movie" value="http://localhost/wordpress32/wp-content/uploads/2011/07/flash.swf"> <param name="quality" value="high"> <embed src="http://localhost/wordpress32/wp-content/uploads/2011/07/flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" height="242" width="1000"></object>
    <noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8.0.22.0" width="1000" height="242"> <param name="movie" value="http://localhost/wordpress32/wp-content/uploads/2011/07/flash.swf"/> <param name="quality" value="high" /><embed src="http://localhost/wordpress32/wp-content/uploads/2011/07/flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="242"></embed></object></noscript>			
	</div>
	<div class="UINavigation">
		<div class="NaviR">
			<div class="NaviM">
				<div class="UISearch">
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
				</div>
				<div class="moduletablemenunavigation">
					<div class="menumenunavigation">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('top_sidebar') ) : ?>
						<?php endif; ?>
					</div>
				</div>				
			</div>
		</div>
	</div>
	<div class="UIBreadcumb">
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	</div>