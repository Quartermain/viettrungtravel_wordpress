<?php get_header(); ?>
<div id="UIContent">                           
	<?php include (TEMPLATEPATH . '/right-sidebar.php'); ?>    
    <?php include (TEMPLATEPATH . '/left-sidebar.php'); ?>
    <div class="UIMain">
			<div class="MainCotent single">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="Post">
				<div class="TopPost">
					<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				</div>
				<div class="PostContent">
					<div class="post-excerpt">
                    	<p><?php the_content(); ?></p>
					
					</div>
				</div>
			</div>			
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
		<?php else : ?>
        		<p style="padding:10px"><?php echo "không tồn tại bài viết nào mời bạn xem mục khác."; ?></p>
		<?php endif; ?> 
			</div>
            <div class="MainCotent">
            <ul class="relatives">
            <h3>Bài viết liên quan</h3>
  <?php do_action(
    'related_posts_by_category',
    array(
	    'orderby' => 'RAND',
	    'order' => 'DESC',
	    'limit' => 6,
	    'echo' => true,
	    'before' => '<li>',
	    'inside' => '<br/> ',
	    'outside' => '',
	    'after' => '</li>',
	    'rel' => 'nofollow',
	    'type' => 'post',
	    'image' => 'thumbnail',
	    'message' => 'No matches'
	  )
	) ?>
</ul>
       </div>     
    </div>
</div>
<?php get_footer(); ?>

