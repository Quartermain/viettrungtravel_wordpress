jQuery(document).ready(function(){	
		jQuery(".jCarouselLite").jCarouselLite({
			vertical: true,
			   auto: true

		});
		jQuery(".Boxs ul ul li,.menumenunavigation ul ul > li ").hover(function(){jQuery(this).find('ul:first').fadeIn(200)},function(){jQuery(this).find('ul:first').fadeOut(100)});
		var count=jQuery('.dvtx li').length;
		if (count>6) {
			jQuery('.dvtx li').slice(6).hide()
			jQuery('.dvtx').append('<a href="#" class="more" style="color:#8E000B;float:right;clear:both">more</a>')
			jQuery('.dvtx .more').click(function(){
				if(jQuery('.dvtx li').slice(6).is(':visible')) {
				
				jQuery('.dvtx li').slice(6).hide()
				}
				else {
				
				jQuery('.dvtx li').slice(6).show()
				}
				return false;
			})
		}
		var count1=jQuery('.dvdl li').length;
		if (count1>6) {
			jQuery('.dvdl li').slice(6).hide()
			jQuery('.dvdl').append('<a href="#" class="more" style="color#8E000B;float:right;clear:both">more</a>')
			jQuery('.dvdl .more').click(function(){
				if(jQuery('.dvdl li').slice(6).is(':visible')) {
				
				jQuery('.dvdl li').slice(6).hide()
				}
				else {
				
				jQuery('.dvdl li').slice(6).show()
				}
				return false;
			})
		}
		var count1=jQuery('.tthi li').length;
		if (count1>4) {
			jQuery('.tthi li').slice(4).hide()
			jQuery('.tthi').append('<a href="#" class="more" style="color:#8E000B;float:right;clear:both">more</a>')
			jQuery('.tthi .more').click(function(){
				if(jQuery('.tthi li').slice(4).is(':visible')) {
				
				jQuery('.tthi li').slice(4).hide()
				}
				else {
				
				jQuery('.tthi li').slice(4).show()
				}
				return false;
			})
		}
});
 
