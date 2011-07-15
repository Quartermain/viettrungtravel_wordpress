
	<div class="span-5 last">
		<div class="sidebar sidebar-right">
        <div id="topsearch" > 
    		<?php get_search_form(); ?> 
    	</div>

			<div class="sidebaradbox">
    			<?php sidebar_ads_125(); ?>
    		</div>
			<ul>
				<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
					
					<li id="tag_cloud"><h2>Tags</h2>
                        <div><?php wp_tag_cloud('largest=16&format=flat&number=20'); ?></div>
						
					</li>
					
					<li><h2>Archives</h2>
						<ul>
						<?php wp_get_archives('type=monthly'); ?>
						</ul>
					</li>
					
					<li> 
						<h2>Calendar</h2>
						<?php get_calendar(); ?> 
					</li>
					<?php wp_list_bookmarks(); ?>
						
				<li><h2>Meta</h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
						<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
						<?php wp_meta(); ?>
					</ul>
					</li>
	
				<?php endif; ?>
			</ul>
		<?php if(get_theme_option('ad_sidebar2_bottom') != '') {
		?>
		<div class="sidebaradbox">
			<?php echo get_theme_option('ad_sidebar2_bottom'); ?>
		</div>
		<?php
		}
		?>
		</div>
		
	</div>
