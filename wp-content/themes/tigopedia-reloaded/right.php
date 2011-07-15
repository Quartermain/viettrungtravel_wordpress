<div class="right-sidebar">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>

        <div class="widget-title">Pages</div>
        <div class="widget">
	     <ul>
             <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
             </ul>
	</div>

	<div class="widget-title">Search</div>
	<div class="widget">
             <?php include (TEMPLATEPATH . '/searchform.php'); ?>
        </div>
		
	<div class="widget-title">Calendar</div>
	<div align="center" class="widget">
             <?php get_calendar(); ?>
        </div>
		
	<?php /* If this is the frontpage */ if ( is_home() ) { ?>				

	<div class="widget-title">Meta</div>
	<div class="widget">
	     <ul>
	     <?php wp_register(); ?>
	     <li><?php wp_loginout(); ?></li>
	     <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
	     <?php wp_meta(); ?>
	     </ul>
	</div>

	<?php } ?>

<?php endif; ?>

</div>