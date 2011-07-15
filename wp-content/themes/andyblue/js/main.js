jQuery(document).ready(function(){	
		jQuery(".jCarouselLite").jCarouselLite({
			vertical: true,
			   auto: true

		});
		jQuery(".Boxs ul ul li,.menumenunavigation ul ul > li ").hover(function(){jQuery(this).find('ul:first').fadeIn(200)},function(){jQuery(this).find('ul:first').fadeOut(100)});
});
 