<?php get_header(); ?>
<div id="UIContent">                           
	<?php include (TEMPLATEPATH . '/right-sidebar.php'); ?>    
    <?php include (TEMPLATEPATH . '/left-sidebar.php'); ?>
    <div class="UIMain">


	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<?php /* If this is a category archive */ if (is_category()) { ?>	
		<h5 class="pagetitle">Archive for  '<?php echo single_cat_title(); ?>' Category</h5>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h5 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h5>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h5 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h5>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h5 class="pagetitle">Archive for <?php the_time('Y'); ?></h5>
	<?php /* If this is a search */ } elseif (is_search()) { ?>
		<h5 class="pagetitle">Search Results</h5>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h5 class="pagetitle">Author Archive</h5>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h5 class="pagetitle">Archives</h5>
	<?php /* If this is a tag archive */ } elseif (is_tag()){ ?>
		<h5 class="pagetitle">Archives by Tag '<?php single_tag_title(); ?>'</h5>
	<?php } ?>

	<?php while (have_posts()) : the_post(); ?>

		<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link a <?php the_title(); ?>"><?php the_title(); ?></a>
		<?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Edit Link" />','<span class="editlink">','</span>'); ?></h4>

	<div class="info-post">By <b><?php the_author () ?></b> - <b>Last updated:</b> <?php the_time('l, F j, Y') ?></div>
		<?php the_excerpt() ?>
		
	<?php endwhile; ?>
		
<?php include (TEMPLATEPATH . '/navigation.php'); ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>

		<?php endif; ?>

	</div>
</div>
<?php get_footer(); ?>