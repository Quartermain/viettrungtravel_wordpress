<?php 
/*
Plugin Name: p2pConverter
Plugin URI: http://www.briandgoad.com/blog/downloads/p2pConverter
Version: 0.8
Author: Brian D. Goad
Author URI: http://www.briandgoad.com/blog
Description: This plugin allows you to easily convert a post to a page and vice versa through an easy to use interface. You may either click on your Manage tab in Administration, and you will see a Convert option under Posts and Pages sub-tabs, or click Convert while editing a post or page in the bottom right side bar. A p2pConverter role capability prevents unwanted users from converting pages (i.e. only Administrators and Editors have this ability), which can be adjusted by using a Role Manager plugin.
*/
	
register_activation_hook(__FILE__,'p2p_install');
register_deactivation_hook(__FILE__,'p2p_uninstall');	

//Add p2p Capabilities to top two basic roles. Can be adjusted with Role Manager plugin.	
function p2p_install() {
	$role = get_role('administrator');
	$role->add_cap('p2pConverter');
	$role2 = get_role('editor');
	$role2->add_cap('p2pConverter');
}

//Removes p2p Capabilities from basic roles.
function p2p_uninstall() {
	$check_order = array("subscriber", "contributor", "author", "editor", "administrator");
	foreach ($check_order as $role) {
			$the_role = get_role($role);
			if ( empty($the_role) )
			continue;
			$the_role->remove_cap(p2pConverter) ;
	}
}

//AJAX-ify
add_action('admin_print_scripts', 'p2p_js_admin_header' );
function p2p_js_admin_header() {
	// use JavaScript SACK, script.aculo.us, libraries for Ajax
	wp_print_scripts( array( 'sack' ));
	wp_enqueue_script('scriptaculous');
	?>
	<script type="text/javascript">
	//<![CDATA[
	
	//Call AJAX in Wordpress
	function p2p_send(pid, ptype) {
	
		var mysack = new sack("<?php bloginfo( 'wpurl' ); ?>/wp-admin/admin-ajax.php");    

		mysack.execute = 1;
		mysack.method = 'POST';
		mysack.setVar( "action", "convert" );
		mysack.setVar( "post", pid );
		mysack.setVar( "ptype", ptype );
		mysack.encVar( "cookie", document.cookie, false );
		mysack.onError = function() { alert('Ajax error in p2pConverter' )};
		mysack.runAJAX();

		return true;
	
	} 
	
	//Called after running PHP to determine what to do
	function determineFunc(pid, ptype) {
		
		pid = escape(pid);
		ptype = escape(ptype);
		var boo = escape(window.location.pathname);

		if (boo.match("edit.php")||boo.match("edit-pages.php")){
			ptype = reverse_type(ptype);
			remove_row(pid, ptype);
		} else {
			editDoc(pid, ptype);
		}
	
	}
	
	function hoverOver(pid, ptype) {
		pid = escape(pid);
		ptype = escape(reverse_type(ptype));
		var row = document.getElementById(ptype+"-"+pid);
		row.style.backgroundColor = "#FFCC99";
	}
	
	function hoverOut(pid, ptype) {
		pid = escape(pid);
		ptype = escape(reverse_type(ptype));
		var row = document.getElementById(ptype+"-"+pid);
		row.style.backgroundColor = ""
	}
	
	//If in Manage Section, remove nicely
	function remove_row(pid, ptype) {
		
		var row = document.getElementById(ptype+"-"+pid);
		row.style.backgroundColor = "#FF9900";
		Effect.Fade(row, {duration: .75 });
	
	}
	
	//If in Edit Section, return to correct section
	function editDoc(pid, ptype) {
	
		gotoUrl = escape(ptype) + ".php?action=edit&post=" + escape(pid);
		this.location.href = gotoUrl;
	
	}
	
	//Reverse the type sent
	function reverse_type(orig) {
		
		if (orig == "post") {
			var newOrig = "page";
		} else if (orig == "page") {
			var newOrig = "post";
		} 
		return newOrig;
	
	}
	
	//]]>
	</script>

	<?php
}

//Updates Database if valid info is passed, via AJAX
add_action('wp_ajax_convert', 'update_convert');
function update_convert() {
	// Checks if appropriate Role has Capability to Edit Post
	if ( function_exists('current_user_can') && (current_user_can('p2pConverter'))) {
		$ready = false;
		if(@$_POST['post']) :
			if(@$_POST['ptype']) :
				$p_id = attribute_escape(@$_POST['post']);
				global $wpdb, $wp_rewrite;
				$table = $wpdb->prefix. "posts";
				$ptype = attribute_escape(@$_POST['ptype']);
				$pupdate = "UPDATE " . $table . " SET post_type = '" . $ptype . "' WHERE ID='" . $p_id . "'";
				$wpdb->query($pupdate);
				
				//Important! Rewrites permalinks for post/page files 
				$wp_rewrite->flush_rules();
				
				//Call Javascript function
				die('determineFunc("'.$p_id.'", "'.$ptype.'");');
				
			endif;
		endif;
	}
}

//The basic display across the admin screen
function basicLooks($post_id, $ptype) {
	if ( function_exists('current_user_can') && current_user_can('p2pConverter')) {
		$title = preg_replace("/\r?\n/", "\\n", addslashes(strip_tags(get_the_title("", "", false)))); 
		$optype = ucwords(reverse_type($ptype));
		$uptype = ucwords($ptype);
		$message = 'Are you sure you really want to convert this ' . $optype . ', ' . $title . ', into a '. $uptype . '?';
		$button_text = "Convert to " . $uptype . "!";
		$con_div = '<div style="width:130px; padding:7px;"><a class="button button-highlighted" href="javascript:void(null)" onmouseover="hoverOver(' . $post_id . ', \'' . $ptype . '\');" onmouseout="hoverOut(' . $post_id . ', \'' . $ptype . '\');" onClick=\'if (confirm("' . $message . '")) {p2p_send(' . $post_id . ', "' . $ptype . '"); }\'>'.__($button_text).'</a></div>';
		echo $con_div;
		return;
	}
}

//Have to be able to reverse type in PHP as well
function reverse_type($orig) {
	if ($orig == "post") {
		$orig = "page";
	} elseif ($orig == "page") {
		$orig = "post";
	} 
	return $orig;
}

//Check version info for display qualifications
add_action('admin_head', 'edit_p2p');
function edit_p2p() {
	if ( function_exists('current_user_can') && current_user_can('p2pConverter')) {
		if ( version_compare(get_bloginfo('version'), '2.7', '>=')) {
			add_action('post_submitbox_start', 'add_side_option');
		} else {
			add_action('submitpost_box', 'add_side_option');
			add_action('submitpage_box', 'add_side_option');
		}
	}
}

//Add Convert option while editing posts/pages
function add_side_option(){
	global $post;
	$post_id = $post->ID;
	$p_type = reverse_type($post->post_type);
	basicLooks($post_id, $p_type);
}


//Adds Column in Manage Posts
add_filter('manage_posts_columns', 'add_convert_column_post'); 
function add_convert_column_post($defaults) {
	$defaults ['convert_post']  = '<div style="text-align: center; width:100px;">' . __('Convert to Page') . '</div>';
	// Checks if appropriate Role has Capability to Edit Post
	if ( function_exists('current_user_can') && !current_user_can('p2pConverter')) {
		unset($defaults['convert_post']);
	}
	return $defaults;
}

//Populates Convert option in Manage Posts
add_action('manage_posts_custom_column', 'pop_convert_column_post', 10, 2);
function pop_convert_column_post($column_name, $post_id){
	if( $column_name == 'convert_post' ) {
		basicLooks($post_id, "page");
	}
	
}

//Adds Column in Manage Pages (thanks Scompt!)
add_filter('manage_pages_columns', 'add_convert_column_page'); 
function add_convert_column_page($defaults) {
	$defaults ['convert_page']  = '<div style="text-align: center; width:100px;">' . __('Convert to Post') . '</div>';
	
	// Checks if appropriate Role has Capability to Edit Post
	if ( function_exists('current_user_can') && (!current_user_can('p2pConverter'))) {
		unset($defaults['convert_page']);
	}
	return $defaults;
}
	
//Populates Convert option in Manage Pages (thanks Scompt!)
add_action('manage_pages_custom_column', 'pop_convert_column_page', 10, 2);
function pop_convert_column_page($column_name, $post_id){
	if( $column_name == 'convert_page' ) {
		basicLooks($post_id, "post");
	}
}

?>