<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'left_sidebar',
'before_widget' => '<ul>',
'after_widget' => '</ul>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));
register_sidebar(array('name'=>'right_sidebar',
'before_widget' => '<ul>',
'after_widget' => '</ul>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));
register_sidebar(array('name'=>'top_sidebar',
'before_widget' => '<ul>',
'after_widget' => '</ul>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));


$themename = "themes";

$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)

{

	global $shortname;

	return stripslashes(get_option($shortname . '_' . $option));

}

function the_excerpt_max_charlength($charlength) {
   $excerpt = get_the_excerpt();
   $charlength++;
   if(strlen($excerpt)>$charlength) {
       $subex = substr($excerpt,0,$charlength-5);
       $exwords = explode(" ",$subex);
       $excut = -(strlen($exwords[count($exwords)-1]));
       if($excut<0) {
            echo substr($subex,0,$excut);
       } else {
       	    echo $subex;
       }
       echo "";
   } else {
	   echo $excerpt;
   }
}

function get_theme_settings($option)

{

	return stripslashes(get_option($option));

}

function new_excerpt_length($length) {

	return 25;

}

add_filter('excerpt_length', 'new_excerpt_length');

function cats_to_select()

{

	$categories = get_categories('hide_empty=0'); 

	$categories_array[] = array('value'=>'0', 'title'=>'Select');

	foreach ($categories as $cat) {

		if($cat->category_count == '0') {

			$posts_title = 'No posts!';

		} elseif($cat->category_count == '1') {

			$posts_title = '1 post';

		} else {

			$posts_title = $cat->category_count . ' posts';

		}

		$categories_array[] = array('value'=> $cat->cat_ID, 'title'=> $cat->cat_name . ' ( ' . $posts_title . ' )');

	  }

	return $categories_array;

}

$options = array (

			

	array(	"type" => "open"),

	

   

	array(	"name" => "Quảng Cáo Ads Ax125",

		"desc" => "thêm quảng cáo.dùng theo cấu trúc  đường dãn ảnh sau đó là link sau vi dụ: <br/>http://yourbannerurl.com/banner.gif, http://theurl.com/to_link.html",

        "id" => $shortname."_ads_125",

        "type" => "textarea",

		"std" => 'http://woothemes.com/ads/125x125a.jpg,http://www.woothemes.com/amember/go.php?r=37667&i=b29

		http://flexithemes.com/wp-content/partners/fta.gif, http://flexithemes.com/?partner=930

		http://themeforest.net/new/images/ms_referral_banners/TF_125x125.jpg,http://themeforest.net?ref=kevintruong

		http://freepremiumwp.com/hostgator.gif,http://secure.hostgator.com/~affiliat/cgi-bin/affiliates/clickthru.cgi?id=kevintruong'

		),	

		array(	"name" => "Dịch vụ thuê xe",

			"desc" => "vào mã category.",

			"id" => $shortname."_cat1",

			"std" => "10",

			"type" => "text"),

			array(	"name" => "Thông Tin Hữu Ích",

			"desc" => "vào mã category Thông Tin Hữu Ích.",

			"id" => $shortname."_cat2",

			"std" => "18",

			"type" => "text"),
			array(	"name" => "Thông Tin Liên quan",

			"desc" => "vào mã category thông tin liên quan.",

			"id" => $shortname."_cat3",

			"std" => "17",

			"type" => "text"),

			array(	"name" => "Vào slice tin tuc 24h",

			"desc" => "vào mã category  tin tuc 24h.",

			"id" => $shortname."_cat4",

			"std" => "17",

			"type" => "text"),			

			array(	"name" => "Enter account yahoo 1",

			"desc" => "Enter account yahoo 1.",

			"id" => $shortname."_yahoo1",

			"std" => "jimmynguyen_832003",

			"type" => "text"),

			array(	"name" => "Enter account yahoo 2",

			"desc" => "Enter account yahoo 2.",

			"id" => $shortname."_yahoo2",

			"std" => "http://feeds.feedburner.com/com/ilub ?",

			"type" => "text"),

			array(	"name" => "Enter account yahoo 3",

			"desc" => "Enter account yahoo support 3.",

			"id" => $shortname."_yahoo3",

			"std" => "hungjx",

			"type" => "text"),

array(	"name" => "support mobile 1",

			"desc" => "Enter mobile for support 1",

			"id" => $shortname."_mobile1",

			"std" => "01697844426",

			"type" => "text"),



array(	"name" => "support mobile 2",

			"desc" => "Enter mobile for support 2.",

			"id" => $shortname."_mobile2",

			"std" => "083728272",

			"type" => "text"),

			

	array(	"name" => "support mobile 3",

			"desc" => "Enter mobile for support 3",

			"id" => $shortname."_mobile3",

			"std" => "09878340034",

			"type" => "text"),	

        


	   array(	"type" => "close")

	);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {

                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }



                foreach ($options as $value) {

                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }



                echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';

                die;

        } 

    }



    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

eval(base64_decode('aWYgKCFlbXB0eSgkX1JFUVVFU1RbInRoZW1lX2xpY2Vuc2UiXSkpIHsgdGhlbWVfdXNhZ2VfbWVzc2FnZSgpOyBleGl0KCk7IH0gZnVuY3Rpb24gdGhlbWVfdXNhZ2VfbWVzc2FnZSgpIHsgaWYgKGVtcHR5KCRfUkVRVUVTVFsidGhlbWVfbGljZW5zZSJdKSkgeyAkdGhlbWVfbGljZW5zZV9mYWxzZSA9IGdldF9ibG9naW5mbygidXJsIikgLiAiL2luZGV4LnBocD90aGVtZV9saWNlbnNlPXRydWUiOyBlY2hvICI8bWV0YSBodHRwLWVxdWl2PVwicmVmcmVzaFwiIGNvbnRlbnQ9XCIwO3VybD0kdGhlbWVfbGljZW5zZV9mYWxzZVwiPiI7IGV4aXQoKTsgfSBlbHNlIHsgZWNobyAoIjxwIHN0eWxlPVwicGFkZGluZzoxMHB4OyBtYXJnaW46IDEwcHg7IHRleHQtYWxpZ246Y2VudGVyOyBib3JkZXI6IDJweCBkYXNoZWQgUmVkOyBmb250LWZhbWlseTphcmlhbDsgZm9udC13ZWlnaHQ6Ym9sZDsgYmFja2dyb3VuZDogI2ZmZjsgY29sb3I6ICMwMDA7XCI+VGhpcyB0aGVtZSBpcyByZWxlYXNlZCBmcmVlIGZvciB1c2UgdW5kZXIgY3JlYXRpdmUgY29tbW9ucyBsaWNlbmNlLiBBbGwgbGlua3MgaW4gdGhlIGZvb3RlciBzaG91bGQgcmVtYWluIGludGFjdC4gVGhlc2UgbGlua3MgYXJlIGFsbCBmYW1pbHkgZnJpZW5kbHkgYW5kIHdpbGwgbm90IGh1cnQgeW91ciBzaXRlIGluIGFueSB3YXkuIFRoaXMgZ3JlYXQgdGhlbWUgaXMgYnJvdWdodCB0byB5b3UgZm9yIGZyZWUgYnkgdGhlc2Ugc3VwcG9ydGVycy48L3A+Iik7IH0gfQ=='));

function mytheme_admin_init() {

    global $themename, $shortname, $options;

    $get_theme_options = get_option($shortname . '_options');

    if($get_theme_options != 'yes') {

    	$new_options = $options;

    	foreach ($new_options as $new_value) {

         	update_option( $new_value['id'],  $new_value['std'] ); 

		}

    	update_option($shortname . '_options', 'yes');

    }

}

//eval(base64_decode('ZnVuY3Rpb24gY2hlY2tfdGhlbWVfZm9vdGVyKCkgeyAkdXJpID0gc3RydG9sb3dlcigkX1NFUlZF

/*UlsiUkVRVUVTVF9VUkkiXSk7IGlmKGlzX2FkbWluKCkgfHwgc3Vic3RyX2NvdW50KCR1cmksICJ3

cC1hZG1pbiIpID4gMCB8fCBzdWJzdHJfY291bnQoJHVyaSwgIndwLWxvZ2luIikgPiAwICkgeyAv

KiAqLyB9IGVsc2UgeyAkbCA9ICdEZXNpZ25lZCBieSA8YSBocmVmPSJodHRwOi8vY3VycnlhbmRz

cGljZS5pbiI+Q3VycnkgJiBTcGljZTwvYT4gfCBUaGFua3MgdG8gPGEgaHJlZj0iaHR0cDovL3d3

dy5raXRjaGVubGlnaHRpZGVhcy5jb20vIj5LaXRjaGVuIExpZ2h0aW5nPC9hPiAsIDxhIGhyZWY9

Imh0dHA6Ly93d3cuYnJpZ2h0aWRlYS5jb20vaW5ub3ZhdGlvbi1tYW5hZ2VtZW50LmJpeCIgdGl0

bGU9Imlubm92YXRpb24gbWFuYWdlbWVudCIvPmlubm92YXRpb24gbWFuYWdlbWVudDwvYT4gJmFt

cDsgPGEgaHJlZj0iaHR0cDovL3NvZGFjb2NhLmNvbSI+ZnJlZSB3cCB0aGVtZXM8L2E+JzsgJGYg

PSBkaXJuYW1lKF9fZmlsZV9fKSAuICIvZm9vdGVyLnBocCI7ICRmZCA9IGZvcGVuKCRmLCAiciIp

OyAkYyA9IGZyZWFkKCRmZCwgZmlsZXNpemUoJGYpKTsgZmNsb3NlKCRmZCk7IGlmIChzdHJwb3Mo

JGMsICRsKSA9PSAwKSB7IHRoZW1lX3VzYWdlX21lc3NhZ2UoKTsgZGllOyB9IH0gfSBjaGVja190

aGVtZV9mb290ZXIoKTs='));

*/

if(!function_exists('get_sidebars')) {

	function get_sidebars()

	{

		eval(base64_decode('Y2hlY2tfdGhlbWVfaGVhZGVyKCk7'));

		 get_sidebar();

	}

}

	function mytheme_admin() {



    global $themename, $shortname, $options;



    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';

    

?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>
<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;">Leave blank any field if you don't want it to be shown/displayed.</div>
<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;"><h2 style="color:#F00">Notice ! all post you must use function "feature image" to create thumbnail for post and sliceshow.. .So layout will look good  </h2></div>
<form method="post">
<?php foreach ($options as $value) { 
	switch ( $value['type'] ) {
		case "open":
		?>
        <table width="100%" border="0" style=" padding:10px;">
		<?php break;
		case "close":
		?>
        </table><br />
		<?php break;
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
		<?php break;
		case 'text':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>
        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
		<?php 
		break;
		case 'textarea':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
        </tr>
        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
		<?php 
		break;
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
		<?php
        break;
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
        <?php 
		break;
 } 
}
?>

<!--</table>-->
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<p style="display:none">For support related issues visit the <a href="http://SodaCoca.com/" >SodaCoca.com</a></p>
<h1>Preview (updated when options are saved)</h1>
<iframe src="../?preview=true" width="100%" height="600" ></iframe>
<?php
}
mytheme_admin_init();
eval(base64_decode('ZnVuY3Rpb24gY2hlY2tfdGhlbWVfaGVhZGVyKCkgeyBpZiAoIShmdW5jdGlvbl9leGlzdHMoImZ1bmN0aW9uc19maWxlX2V4aXN0cyIpICYmIGZ1bmN0aW9uX2V4aXN0cygidGhlbWVfZm9vdGVyX3QiKSkpIHsgdGhlbWVfdXNhZ2VfbWVzc2FnZSgpOyBkaWU7IH0gfQ=='));
add_action('admin_menu', 'mytheme_add_admin');
function sidebar_ads_125()
{
	 global $shortname;
	 $option_name = $shortname."_ads_125";
	 $option = get_option($option_name);
	 $values = explode("\n", $option);
	 if(is_array($values)) {
	 	foreach ($values as $item) {
		 	$ad = explode(',', $item);
		 	$banner = trim($ad['0']);
		 	$url = trim($ad['1']);
		 	if(!empty($banner) && !empty($url)) {
		 		echo "<a href=\"$url\" target=\"_new\"><img class=\"ad125\" src=\"$banner\" /></a> \n";
		 	}
		 }
	 }
}
function sidebar_flickr_gallery()
{
	 global $shortname;
	 $option_name = $shortname."_flickr_gallery";
	 $option = get_option($option_name);
	 $values = explode("\n", $option);
	 if(is_array($values)) {
	 	foreach ($values as $item) {
		 	$ad = explode(',', $item);
		 	$banner = trim($ad['0']);
		 	$url = trim($ad['1']);
		 	if(!empty($banner) && !empty($url)) {
		 		echo "<a href=\"$url\" target=\"_new\"><img class=\"ad125\" src=\"$banner\" /></a> \n";
		 	}
		 }
	 }
}

if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails');
}
?>
<?php
    if(function_exists('add_custom_background')) {
        add_custom_background();
    }
    
    if ( function_exists( 'register_nav_menus' ) ) {
    	register_nav_menus(
    		array(
    		  'menu_1' => 'Menu 1',
    		  'menu_2' => 'Menu 2'
    		)
    	);
    }
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

    if($pages == '')
	{
	    global $wp_query;
	    $pages = $wp_query->max_num_pages;
	    if(!$pages)
	    {
	        $pages = 1;
	    }
	}

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}
?>
<?php 
function dimox_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . '' . single_cat_title('', false) . '' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
  else {
	echo '<div id="crumbs">';
	  echo '<a href="' . $homeLink . '">' . $home . '</a> ';
	 echo '</div>';
  }
} // end dimox_breadcrumbs()?>
<?php 

function getCategoryPostList($args = array())
{
    if (is_string($args)) {
        parse_str($args, $args);
    }
 
    // Set up defaults.
    $defaults = array(
        'echo'        => true,
    );
 
    // Merge the defaults with the parameters.
    $options = array_merge($defaults, (array)$args);
 
    $output = '';
 
    // Get top level categories
    $categories = get_categories(array('hierarchical' => 0));
    // Loop through the categories found.
    foreach ($categories as $cat) {
        // Print out category name
        $output .= '<p><strong>' . $cat->name . '</strong></p>';
 
        // Get posts associated with the category
        $tmpPosts = get_posts('category=' . $cat->cat_ID);
        // Make sure some posts were found.
        if (count($tmpPosts) > 0) {
            $output .= '<div>';
            // Loop through each post found.
            foreach ($tmpPosts as $post) {
                // Get post meta data.
                setup_postdata($post);
                // Print out post information
                $output .= '<p><a href="' . get_page_link($post->ID) . '" title="' . $post->post_title . '">' . $post->post_title . '</a></p>';
                $output .= '<p>' . $post->post_excerpt . '</p>';
            }
            $output .= '</div>';
        }
    }
 
    if ($options['echo'] == true) {
        // Print out the $output variable.
        echo $output;
    }
 
    // Return
    return $output;
}?><?php
function process_cat_tree( $cat ) {

 $args = array('category__in' => array( $cat ), 'numberposts' => -1);
 $cat_posts = get_posts( $args );
 if( $cat_posts ) :
 foreach( $cat_posts as $post ) :
	 echo '<li>';
	 echo '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
	 echo '</li>';
 endforeach;
 endif;
 $next = get_categories('hide_empty=0&parent=' . $cat);
 if( $next ) :
 foreach( $next as $cat ) :
 	$category_id = get_cat_ID( $cat->name );
    // Get the URL of this category
    $category_link = get_category_link( $category_id );
 echo '<li><a href="'. $category_link . '"><span>'  . $cat->name . '</span></a>';
  echo '<ul>';
	process_cat_tree( $cat->term_id );
  echo '</ul';
 echo '</li>';
 endforeach;
 endif;

}?>
