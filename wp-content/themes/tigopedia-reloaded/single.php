<?php get_header(); ?>

<?php include(TEMPLATEPATH."/left.php");?>
<?php include(TEMPLATEPATH."/right.php");?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="center-widget-title"></div>
    <div class="center-widget">
         <div id="post-<?php the_ID(); ?>">

              <h2 class="post-title">
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
              </h2>
                     
              <p class="postmeta"> 
	         <span class="post-date"><?php the_time('j M, Y') ?></span>&nbsp;
	         <span class="post-filed"><?php the_category(', ') ?></span>
	         <?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
	      </p>       

	      <div class="post-content">
	           <?php the_content('<p class="serif">' . 'Continue Reading...' . '</p>'); ?>
              </div> <!-- Post Content -->
	      <?php link_pages('<p><strong>' . 'Pages' . ':</strong> ', '</p>', 'number'); ?>

         </div> <!-- post-id -->
    </div> <!-- center-widget -->

    <!-- Social Bookmarks Start -->
    <div class="center-widget-title"></div>
    <div align="center" class="center-widget">
         <a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/stumble.png" alt="Stumble" /></a><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/diggthis.png" alt="Digg" /></a><a href="http://technorati.com/faves?add=<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/technorati.png" alt="Technorati" /></a><a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/reddit.png" alt="Reddit" /></a><a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/delicious.png" alt="Delicious" /></a>
    </div>
    <!-- Social Bookmarks Start End -->

    <?php comments_template(); ?>

<?php endwhile; else: ?>
    <div class="center-widget-title"></div>
    <div class="center-widget">
         <h2>Error 404 - Page Not Found</h2>
		<p>Sorry! but the page you requested has either been deleted or does not exist.</p>
    </div> <!-- center-widget -->
<?php endif; ?>
<?php get_footer(); ?>