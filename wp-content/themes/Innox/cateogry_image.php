<?php
echo "<ul>";
 foreach( get_categories('hide_empty=0&parent=10') as $cat ) :	
		echo "<li>";
		$category_id = get_cat_ID( $cat->name );	 
		$categoryimg= $cat->slug ;
		$categoryname= $cat->name ;
		$category_link = get_category_link( $category_id );
?>
<p><img src="http://localhost/wordpress32/wp-content/uploads/2011/07/<?php echo $cat->slug ; ?>.png" width="150" height="150" alt="<?php echo $categoryname; ?>" /></p>		
<p><a href="<?php echo $category_link ?>" title="<?php echo $categoryname ?><"> <?php echo $categoryname ?></a></p>		
<?php 			
		echo "</li>";
 endforeach;
echo "<ul>";
?>