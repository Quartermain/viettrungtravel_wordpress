<div class="navboxwrapright ">
  <?php if(get_theme_option('yahoo1') != '' || get_theme_option('yahoo2') != '' || get_theme_option('yahoo3') != ''  ) { ?> 
  <style>
  	.support ul li a {
		background:none;
		margin:5px 0;
	}
	.phoneIcon  p{
		font-weight:bold;
		color:#8e000b;;
		font-size:14px;
		padding:0;
	}
	
  </style>
  	<div class="moduletable_menu support">
	<h3>Hỗ trợ trực tuyến</h3>
    <div class="BGM1">
			<ul>
            <li><a href="ymsgr:sendIM?<?php  echo get_theme_option('yahoo1'); ?>"><img border="0" alt="" src="http://presence.msg.yahoo.com/online?u=<?php  echo get_theme_option('yahoo1'); ?>&amp;m=g&amp;t=2&amp;l=us"></a></li>            
            <li><a href="ymsgr:sendIM?<?php  echo get_theme_option('yahoo2'); ?>"><img border="0" alt="" src="http://presence.msg.yahoo.com/online?u=<?php  echo get_theme_option('yahoo2'); ?>&amp;m=g&amp;t=2&amp;l=us"></a></li>
            <li><a href="ymsgr:sendIM?<?php  echo get_theme_option('yahoo3'); ?>"><img border="0" alt="" src="http://presence.msg.yahoo.com/online?u=<?php  echo get_theme_option('yahoo3'); ?>&amp;m=g&amp;t=2&amp;l=us"></a></li>
            </ul>
    </div> 
     <?php if(get_theme_option('mobile1') != '' || get_theme_option('mobile2') != '' || get_theme_option('mobile3') != ''  ) { ?>
	 	<div class="phoneIcon">
     		<p><?php  echo get_theme_option('mobile1'); ?></p>
            <p><?php  echo get_theme_option('mobile2'); ?></p>
            <p><?php  echo get_theme_option('mobile3'); ?></p>
        </div>
	 <?php }?> 
           
</div>   
  <?php }?>
 

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right_sidebar') ) : ?>
	<?php endif; ?>

<div class="moduletable_menu">

	<h3>Tin Tuc 24h</h3>
	<div class="jCarouselLite featureditems_menu" id="jCarouselLiteDemo">
		<div class="BGM1">
			<ul>
				<?php $my_query = new WP_Query('cat='.get_theme_option('cat4')); ?>
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?><li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
	</div>	
	</div>
</div>
 	<div class="moduletable_menu  adv" >
	<h3>Quảng Cáo</h3>
	<?php sidebar_ads_125(); ?>
</div>
</div>

