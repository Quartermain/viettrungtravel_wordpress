<?php get_header(); ?>

<?php include(TEMPLATEPATH."/left.php");?>
<?php include(TEMPLATEPATH."/right.php");?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="center-widget-title"></div>
    <div class="center-widget">
         <div id="post-<?php the_ID(); ?>">

              <h2 class="post-title">
                  <?php the_title(); ?>
              </h2>

	      <div class="post-content">
	           <?php the_content('<p class="serif">' . 'Continue Reading...' . '</p>'); ?>
              </div> <!-- Post Content -->
	      <?php link_pages('<p><strong>' . 'Pages' . ':</strong> ', '</p>', 'number'); ?>
         </div>  <!-- post-id -->
    </div> <!-- center-widget -->

    <!-- Social Bookmarks Start -->
    <div class="center-widget-title"></div>
    <div align="center" class="center-widget">
         <a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/stumble.png" alt="Stumble" /></a><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/diggthis.png" alt="Digg" /></a><a href="http://technorati.com/faves?add=<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/technorati.png" alt="Technorati" /></a><a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/reddit.png" alt="Reddit" /></a><a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/delicious.png" alt="Delicious" /></a>
    </div>
    <!-- Social Bookmarks Start End -->
	
<?php endwhile; else: ?>
    <div class="center-widget-title"></div>
    <div class="center-widget">
         <h2>Error 404 - Page Not Found</h2>
	 <p>Sorry! but the page you requested has either been deleted or does not exist.</p>
    </div> <!-- center-widget -->
<?php endif; ?>
<?php get_footer(); ?>