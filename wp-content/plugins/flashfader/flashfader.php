<?php
/*

Plugin Name: Flashfader
Plugin URI: http://www.lynk.de/wordpress/flashfader/
Description: This plugin allows you to put a flash slideshow on your site. Image upload and configuration via the admin panel.
Version: 1.1.1
Author: Marcus Grellert
Author URI: http://www.lynk.de/wordpress/flashfader/

Copyright (c) 2005 Marcus Grellert - email: wp#lynk.de

Code on this page released under the MIT license
http://www.opensource.org/licenses/mit-license.html


Additional Credits:
Original crossfading slideshow flash by Todd Dominey
http://whatdoiknow.org/archives/001629.shtml


Installation - Usage - Uninstallation => readme.txt



*/


 // ==============================
//  STUFF ONE MIGHT WANT TO CHANGE

$lynkff_txt_gd = '<b>Your server does not seem to support the GD image functions.</b><br />Flashfader depends on the GD lib, functions that support image creation and modification. <a href="http://www.php.net/manual/en/ref.image.php" target="_blank">http://www.php.net/manual/en/ref.image.php</a><br />';

$lynkff_txt_dir = 'To use Flashfader, the directory <b>"wp-content"</b> within your WordPress installation on your webserver must be writeable.<br /><br />To change permission, use a FTP program to access your websever and right-click on the directory <b>"wp-content"</b>.<br /> Tick all boxes that say "Write" or set the permission to <b>777</b>.';

$lynkff_submit_ok = '<b>Done!</b>';

		
		
 // =============
// FUNCTIONS


/*
* Add menu item to WP admin panel
*/
if(!function_exists('lynkff_addAdminMenu')) {	
	function lynkff_addAdminMenu()	{
	add_submenu_page('edit.php', 'Flashfader Administration', 'Flashfader', 9, 'flashfader.php','lynkff_displayForm');
	}
}




/*
* Check for GD lib
*/
function lynkff_checkGd(){
	if(extension_loaded('gd')){
	return true;
	}	
	else{
		return false;
		}
}



/*
* Check/Create folder/files for images & xml
*/
function lynkff_checkDir()
{
	$default_serial = 'a:9:{s:12:"lynkff_width";s:3:"185";s:13:"lynkff_height";s:2:"60";s:12:"lynkff_color";s:7:"#ffffff";s:12:"lynkff_order";s:1:"1";s:11:"lynkff_loop";s:1:"1";s:11:"lynkff_time";s:1:"9";s:11:"lynkff_fade";s:1:"2";s:12:"lynkff_valid";s:1:"1";s:13:"lynkff_submit";s:4:"Save";}';

	if(file_exists(ABSPATH.'wp-content/flashfader/'))
	{
	return true;
	}
	elseif(!is_writable(ABSPATH.'wp-content/'))
		{
		return false;		
		}
		else
			{
			mkdir(ABSPATH.'wp-content/flashfader/',0777);
				
			// Write default data file
   			$handle = fopen(ABSPATH.'wp-content/flashfader/data.txt', 'w');
			fwrite($handle, $default_serial);
   			fclose($handle);
			
			// Write default images file
   			$handle = fopen(ABSPATH.'wp-content/flashfader/images.txt', 'w');
			fwrite($handle, '');
   			fclose($handle);
			
			 // Write flash code to embed in html
			lynkff_writeFlashHtml('60','185','#ffffff',1);
			
			return true;	
			}

}//func


/*
* Writes xml which is called by the swf
* Is called every time data or image is being changed
*/
function lynkff_writeImageXml()
{
	// Open file and fill array with unserialized data
	$a_1 = unserialize(file_get_contents(ABSPATH.'wp-content/flashfader/data.txt'));
	
	// order
	$order = 'sequential';
	if($a_1['lynkff_order']!=1)
		$order = 'random';
		
	// loop
	$loop = 'yes';
	if($a_1['lynkff_loop']!=1)
		$loop = 'no';
		

	$out = '<gallery timer="'.$a_1['lynkff_time'].'" order="'.$order.'" fadetime="'.$a_1['lynkff_fade'].'" looping="'.$loop.'" xpos="0" ypos="0">';

	// Get images and their order
	$a_images = unserialize(file_get_contents(ABSPATH.'wp-content/flashfader/images.txt'));
	
	
	// If any images uploaded
	if(is_array($a_images))
	{ 
	ksort($a_images);
					 
		foreach($a_images as $key => $value)
		{
		$out .= '<image path="'.get_settings('siteurl').'/wp-content/flashfader/'.$value.'.jpg" />';						
		}
		
	}

$out .= '</gallery>';

	$handle = fopen(ABSPATH.'wp-content/flashfader/images.xml', 'w');
	fwrite($handle,$out);
   	fclose($handle);
	
}//func 




/*
* Writes flash code to embed in html
*/
function lynkff_writeFlashHtml($height,$width,$color,$valid)
{
	if($valid!=1)
	{
	// invalid xhtml
	$tmpl = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
 width="'.$width.'" height="'.$height.'" id="flashfader" align=""><param name="movie" value="'.get_settings('siteurl').'/wp-content/plugins/flashfader/flashfader.swf" /><param name="FlashVars" value="path2xml='.get_settings('siteurl').'/wp-content/flashfader/images.xml"><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="'.$color.'" /><embed src="'.get_settings('siteurl').'/wp-content/plugins/flashfader/flashfader.swf" FlashVars="path2xml='.get_settings('siteurl').'/wp-content/flashfader/images.xml" quality="high" bgcolor="'.$color.'" width="'.$width.'" height="'.$height.'" name="flashfader" align="" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
 
 </embed></object>';
	}
	else
		{
		// valid xhtml
		$tmpl = '<object type="application/x-shockwave-flash" data="'.get_settings('siteurl').'/wp-content/plugins/flashfader/flashfader.swf" width="'.$width.'" height="'.$height.'"><param name="bgcolor" value="'.$color.'" /><param name="wmode" value="transparent" /><param name="movie" value="'.get_settings('siteurl').'/wp-content/plugins/flashfader/flashfader.swf" /><param name="FlashVars" value="path2xml='.get_settings('siteurl').'/wp-content/flashfader/images.xml" /><param name="quality" value="high" /></object>';
		}

	$handle = fopen(ABSPATH.'wp-content/flashfader/flashfaderhtml.txt', 'w');
	fwrite($handle,$tmpl);
   	fclose($handle);
}



/*
* Crop/Create Image
*/
function lynkff_makeImage($r_image,$dstHeight,$dstWidth,$path_image) 
{
		// Code from some comment on php.net
		
		$srcWidth  = imagesx($r_image);
   		$srcHeight = imagesy($r_image);
		
       if($srcHeight < $srcWidth)
       {
           $ratio = (double)($srcHeight / $dstHeight);
           $cpyWidth = round($dstWidth * $ratio);
		   
           if ($cpyWidth > $srcWidth) {
            $ratio = (double)($srcWidth / $dstWidth);
            $cpyWidth = $srcWidth;
            $cpyHeight = round($dstHeight * $ratio);
            $xOffset = 0;
            $yOffset = round(($srcHeight - $cpyHeight) / 2);
           	} 
			else {
               $cpyHeight = $srcHeight;
               $xOffset = round(($srcWidth - $cpyWidth) / 2);
               $yOffset = 0;
           		}

       } 
	   else {
           $ratio = (double)($srcWidth / $dstWidth);

           $cpyHeight = round($dstHeight * $ratio);
           if ($cpyHeight > $srcHeight)
           {
               $ratio = (double)($srcHeight / $dstHeight);
               $cpyHeight = $srcHeight;
               $cpyWidth = round($dstWidth * $ratio);
               $xOffset = round(($srcWidth - $cpyWidth) / 2);
               $yOffset = 0;
           } 
		   else {
               $cpyWidth = $srcWidth;
               $xOffset = 0;
               $yOffset = round(($srcHeight - $cpyHeight) / 2);
           		}
			}
	   
	   	$newHandle = imagecreatetruecolor($dstWidth,$dstHeight);
		imagecopyresampled($newHandle, $r_image, 0, 0, $xOffset, 0, $dstWidth, $dstHeight, $cpyWidth, $cpyHeight);
  
        if(imagejpeg($newHandle,$path_image,94))
		{
		return TRUE;
		}
		else
			{
			return FALSE;
			}
			
}//func 
		
		
/*
* Removes dir and all its contents
*/
function lynkff_removeDir($dir) {
   if($objs = glob($dir."/*")){
       foreach($objs as $obj) {
           is_dir($obj)? rmdirr($obj) : unlink($obj);
       }
   }
   rmdir($dir);
}
		

		
		
 // ========
// CODE

/*
* Display admin page body
*/
function lynkff_displayForm()
{
	global $lynkff_txt_dir, $lynkff_txt_gd, $lynkff_submit_ok;

	$out = $lynkff_uninstall = '';

	
	// Check for GD lib
	if(lynkff_checkGd() != true) 
	{
	$note .= $lynkff_txt_gd;
	}
	// Check write permissions
	elseif(lynkff_checkDir() != true) 
	{
	$note .= $lynkff_txt_dir;
	}
	else
		{
			
			// IF Settings form is posted
			if(isset($_POST['lynkff_submit'])) 
			{
			//Write serialized Data to file
			$handle = fopen(ABSPATH.'wp-content/flashfader/data.txt', 'w');
			fwrite($handle, serialize($_POST));
   			fclose($handle);
			
			// Write new flash-html
			lynkff_writeFlashHtml($_POST['lynkff_height'],$_POST['lynkff_width'],$_POST['lynkff_color'],$_POST['lynkff_valid']);
			
			// Update XMl
			lynkff_writeImageXml();
			
			$note = $lynkff_submit_ok;
			}
			
			// IF  Image is uploaded
			elseif(isset($_POST['lynkff_upload'])) 
				{
			
					if (empty($_FILES['lynkff_file']['size'])) //if postedfile size = 0
 					{
					$note = 'No image selected';
 					} 
					elseif(!strstr($_FILES['lynkff_file']['type'],"jpeg")) //if type != jpeg
 						{
 						$note = 'Sorry! jpeg/jpg only.';
 						}
						elseif (is_uploaded_file($_FILES['lynkff_file']['tmp_name']))
							{
							$img_id = time(); // use timestamp for unique id
						
							// Get size
							$a_data = unserialize(file_get_contents(ABSPATH.'wp-content/flashfader/data.txt'));
						
							// Create Images
							$r_image = imagecreatefromjpeg($_FILES['lynkff_file']['tmp_name']);
							$new_image = lynkff_makeImage($r_image,$a_data['lynkff_height'],$a_data['lynkff_width'],ABSPATH.'wp-content/flashfader/'.$img_id.'.jpg');
							$new_image = lynkff_makeImage($r_image,60,60,ABSPATH.'wp-content/flashfader/'.$img_id.'_thumb.jpg');
							
							$a_images = unserialize(file_get_contents(ABSPATH.'wp-content/flashfader/images.txt'));
							
							$a_images[] = $img_id;
							
							// Save ser. images
							$handle = fopen(ABSPATH.'wp-content/flashfader/images.txt', 'w');
							fwrite($handle,serialize($a_images));
   							fclose($handle);
							
							// Update XMl
							lynkff_writeImageXml();
							
							$note = $lynkff_submit_ok;
							}
						
				}
				
				// IF  Image are sorted
				elseif(isset($_POST['lynkff_sort']))
					{
					asort($_POST['lynkff_img']);
					
					// Create new array with key order
					foreach($_POST['lynkff_img'] as $key=>$value)
					{
					$a_images[]= $key;					
					}
					
					// Save ser. images
					$handle = fopen(ABSPATH.'wp-content/flashfader/images.txt', 'w');
					fwrite($handle,serialize($a_images));
   					fclose($handle);
					
					// Update XMl
					lynkff_writeImageXml();

					$note = $lynkff_submit_ok;
					}
					
					// IF  Image are sorted
					elseif(isset($_POST['lynkff_del']))
						{
						
						$array = array_flip($_POST['lynkff_del']);
						
						// Remove images
						unlink(ABSPATH.'wp-content/flashfader/'.$array['delete'].'_thumb.jpg');
						unlink(ABSPATH.'wp-content/flashfader/'.$array['delete'].'.jpg');
						
						// Remove from images.txt
						$a_images = unserialize(file_get_contents(ABSPATH.'wp-content/flashfader/images.txt'));
						
							foreach($a_images as $key=>$value)
							{
							if($value!=$array['delete'])
								$a_images2[] = $value;
							}
						
						// Save ser. images
						$handle = fopen(ABSPATH.'wp-content/flashfader/images.txt', 'w');
						fwrite($handle,serialize($a_images2));
   						fclose($handle);
						
						// Update XMl
						lynkff_writeImageXml();
						
						}
						
						// IF  Uninstall
						elseif(isset($_POST['lynkff_uninst']))
							{
							lynkff_removeDir(ABSPATH.'wp-content/flashfader/');
							$note = $lynkff_submit_ok.'<br />
							All files and folders have been deleted. Now click <b>Plugins</b> in the admin panel above and <b>Deactivate</b> the Flashfader plugin.';
							$lynkff_uninstall = 1;
							error_reporting(0);					
							}
					
					
					 // ---------
					// ALWAYS DISPLAYED
					
					// BLOCK Settings
					
					// Open file and populate $_POST with unserialized data
					$_POST = unserialize(file_get_contents(ABSPATH.'wp-content/flashfader/data.txt'));	

					// Check if update to 1.1
					if(!isset($_POST['lynkff_valid']) AND $lynkff_uninstall!=1)
					{
					$_POST['lynkff_valid'] = 1;
					$note .= 'To <b>finish your update to Version 1.1</b> click "Save" in the Display Settings section.';
					}

					$out .= '
					<fieldset class="options"> 
    <legend>Display Settings</legend>
					<form method="post" action="'.$_SERVER['REQUEST_URI'].'">
		
		Width: <input type="text" name="lynkff_width" class="lynkff" value="'.$_POST['lynkff_width'].'"  />px
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height: <input type="text" name="lynkff_height" class="lynkff" value="'.$_POST['lynkff_height'].'" />px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Background-Color: <input type="text" name="lynkff_color" value="'.$_POST['lynkff_color'].'" style="width:60px;" /> (use hexadecimal code including #,i.e.: #ff6600)
		<br /><br />
		
		Fade Order: &nbsp;<input type="text" name="lynkff_order" class="lynkff" value="'.$_POST['lynkff_order'].'" /> (1=sequential, 0=random) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Looping: <input type="text" name="lynkff_loop" class="lynkff" value="'.$_POST['lynkff_loop'].'" /> (1=yes, 0=no)
	<br /><br />
	
	Image display time: <input type="text" name="lynkff_time" class="lynkff" value="'.$_POST['lynkff_time'].'" />sec. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Image2Image fade time: <input type="text" name="lynkff_fade" class="lynkff" value="'.$_POST['lynkff_fade'].'" /> (1=slowest) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; XHTML-valid flash embed:<input type="text" name="lynkff_valid" value="'.$_POST['lynkff_valid'].'" class="lynkff" />(1=yes, 0=no)
	<br /><br />
	
		<input type="submit" name="lynkff_submit" value="Save" />
		</form>
		</fieldset>
		<br />';
		
					// BLOCK Upload and Images
					
					$out .= '<fieldset class="options"> 
    <legend>Upload New Image</legend>
					<form method="post" action="'.$_SERVER['REQUEST_URI'].'" enctype="multipart/form-data">
					Choose Image: <input type="file" name="lynkff_file" />
					<br /><br />
					<input type="submit" name="lynkff_upload" value="Upload" />
					</form>
					<br />
					</fieldset>
					<br />
					 <fieldset class="options"> 
    <legend>Your Images</legend>
					 <form method="post" action="'.$_SERVER['REQUEST_URI'].'">';
					 
					 
					 // Get images.txt
					 $a_images = unserialize(file_get_contents(ABSPATH.'wp-content/flashfader/images.txt'));
					 
					 // If any images uploaded
					 if(is_array($a_images))
					 {
					 
					 ksort($a_images);
					 
					 	foreach($a_images as $key => $value)
						{
						$out .= '<img src="../wp-content/flashfader/'.$value.'_thumb.jpg" border="1" /> <input type="text" class="lynkff" name="lynkff_img['.$value.']" value="'.$key.'" /> <input type="submit" value="delete" name="lynkff_del['.$value.']" /><br />';						
						}
						
					$out .= '<br /><input type="submit" name="lynkff_sort" value="Change Order" />
					</form>
					</fieldset>';
					
					}//if
					
					
					// Add notes
				$out .= '<fieldset class="options"> 
    <legend>Notes</legend>
	<b>Code for the template</b>:<br />
	&lt;?php include (ABSPATH.\'wp-content/flashfader/flashfaderhtml.txt\'); ?&gt;
	<br /><br />
	<b>XHTML-valid flash embed option</b>: Regular code to embed flash movies in HTML includes code which is invalid in XHTML. There is a workaround which validates, but the flash might not display in certain oldish browsers, i.e. IE on Mac, Netscape 4.x . It works with all current big browsers: IE(Win), Firefox, Mozilla, Safari, Opera. 
	</fieldset>';
					
				// Add uninstall
				$out .= '<div style="text-align:right"><form method="post" action="'.$_SERVER['REQUEST_URI'].'"><input type="submit" name="lynkff_uninst" value="Uninstall Flashfader" onclick="javascript:check=confirm(\'You are about to delete all your settings and images! Are you sure?\');if(check==false) return false;" /></form></div>';
				
		
		
	}//else

	
	// Note snuff
	if(!empty($note))
	$note = '<fieldset class="options" style="background:#fef0c2;"> 
    <legend>Notice</legend>'.$note.'</fieldset>';
	
	
	
// Output
echo  '<style type="text/css">
input.lynkff {
width:40px;
}
</style>
<div class="wrap">
<h2>Flashfader Administration</h2>
'.$note.'
'.$out.'
</div>
';

}//func





// Prints HTML
add_action('admin_menu', 'lynkff_addAdminMenu');

?>