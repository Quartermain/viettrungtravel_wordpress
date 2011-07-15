<?php get_header(); ?>

<?php include(TEMPLATEPATH."/right.php");?>
<?php include(TEMPLATEPATH."/left.php");?>

<!-- ########################### The Loop - Begin ################################### -->
<?php if (have_posts()) : ?>
	<!-- If there are any posts, iterate over each post -->
	<?php while (have_posts()) : the_post(); ?>

        <div class="center-widget-title"></div>
		<div class="center-widget">
		
			<h2 class="post-title">
			    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			
			<p class="postmeta"> 
			   <span class="post-date"><?php the_time('j M, Y') ?></span>&nbsp;
			   <span class="post-comment"><?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), 'commentslink', __('Comments off')); ?></span>
			   <?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
			</p>

			<!-- The article content -->
			<div class="post-content">
			     <?php the_content('Continue Reading...'); ?>
			</div><!-- post-content -->

			<!-- Traceback autodiscovery -->
			<!-- <?php trackback_rdf(); ?> -->

	</div> <!-- center-widget -->
	<!-- End of the loop -->
	<?php endwhile; ?>
	
	<!-- Page Navigation -->
	<?php
		global $wpdb, $posts_per_page, $fromwhere, $matches, $max_num_pages,
					 $request, $posts_per_page;
		if (! is_single()) {
			if (get_query_var('what_to_show') == 'posts') {
				if ( ! isset($max_num_pages) ) {
					preg_match('#FROM (.*) GROUP BY#', $request, $matches);
					$fromwhere = $matches[1];
					$numposts = $wpdb->get_var("SELECT COUNT(ID) FROM $fromwhere");
					$max_num_pages = ceil($numposts / $posts_per_page);
				}
			} else {
				$max_num_pages = 999999;
			}

			if ($max_num_pages > 1) {
	?>
        <div class="center-widget-title"></div>
        <div class="center-widget">
		<div class="bottom-page-nav">
		     <?php posts_nav_link('', '', '&laquo; Previous Entries'); ?>
                     <?php echo' | ' ?>
		     <?php posts_nav_link('', 'Next Entries &raquo;', ''); ?>
		</div>
	</div> <!-- center-widget -->
	<?php
			}
		}
	?>

<!-- If no post is found... -->
<?php else : ?>
	<div class="center-widget-title"></div>
	<div class="center-widget">
             <h2>Error 404 - Page Not Found</h2>
	     <p>Sorry! but the page you requested has either been deleted or does not exist.</p>
	</div> <!-- center-widget -->
<?php endif; ?>
<!-- ########################### The Loop - End ##################################### -->
<?php
 foreach( get_categories('hide_empty=0') as $cat ) :

	$categoryimg= $cat->slug ;
?>
<img src="<?php bloginfo('template_directory'); ?>/images/cat/<?php echo $cat->slug ; ?>.png" alt="<?php echo $catthumb; ?>" />
<?php 
 endforeach;

?>


<?php get_footer(); ?>