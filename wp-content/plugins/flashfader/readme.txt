=== Plugin Name ===
Contributors: lynk
Donate link: http://www.lynk.de/wordpress/
Tags: images,image,slideshow,sidebar,flash,flashfader,photographer
Requires at least: 1.5
Tested up to: 3.0.1
Stable tag: 1.1.1


Put a flash slideshow on your wordpress site

== Description ==

This plugin allows you to put a flash slideshow on your site. Image upload and configuration via the admin panel.
Demo: http://www.lynk.de

== Installation ==

0. Update to 1.1.1:
	 If you update to 1.1.1 just copy flashfader.php in your plugins directory,
     go to the flashfader admin and press Save in the Display Settings.

 
1. First Install: Copy the 2 files flashfader.php and flashfader.swf
     in the plugins directory (wp-content/plugins). Activate the plugin.
	  Go to "Posts" in the admin panel, open submenu item "Flashfader"	 


2. Usage:
     If you see the settings and upload page, the installation went fine.
	 Upload 2 images for a test-drive.
	 
	 Now you need to open one of the files of your current template.
	 Assuming you use the default template (wp-content/themes/default),
	 open sidebar.php and copy/paste the code you find at the bottom of the
	 flashfader plugin.
	
	 Upload sidebar.php in the template's directory.
	 Reload your WP homepage and you should see your slidehow.
	
	 sidebar.php was just an example. You can place the code in any template file,
	 just make sure it is placed in html and not within `<?php ?>` tags.
	
	
3. Uninstallation:
  	
	 First remove the code that calls the flash in the template! You might get
	 an ugly error message on your page otherwise.
  
	 The plugin creates one folder (wp-content/flashfader) and some files.
	 Your images are stored in that folder as well.
	 To remove the plugin just use the uninstall button at the bottom of the admin
	 page. You could try to delete the folder via FTP, but some servers won't let 
	 you because of permission settings.
	 That's what the uninstall button is there for.
	 
	 
	 
4. Note on sizes
	
	If you have a working slideshow and change the size in the display
	settings, the current images won't be resized.
	You have to re-upload them so they are cropped according to the new settings.
	
	
	
===========
changelog
	 
	 1.1.1 	2005-10-14 : 
	 changed GD lib checking [no need to upgrade for working install]
	 1.1 	2005-09-?? :
	 added xhtml-valid flash embed option