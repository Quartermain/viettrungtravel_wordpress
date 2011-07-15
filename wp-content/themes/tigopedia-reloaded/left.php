<div class="left-sidebar">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>



<?php endif; ?>
<?php
/*****************************************************************
*
* alchymyth 2011
* a hierarchical list of all categories, with linked post titles
*
******************************************************************/
// http://codex.wordpress.org/Function_Reference/get_categories

 foreach( get_categories('hide_empty=0') as $cat ) :
 if( !$cat->parent ) {
	$category_id = get_cat_ID( $cat->name );
    // Get the URL of this category
    $category_link = get_category_link( $category_id );

 echo '<ul><li><strong><a href="'. $category_link . '">'  . $cat->name . '</a></strong></li>';
 process_cat_tree( $cat->term_id );
 }
 endforeach;

 wp_reset_query(); //to reset all trouble done to the original query
//
function process_cat_tree( $cat ) {

 $args = array('category__in' => array( $cat ), 'numberposts' => -1);
 $cat_posts = get_posts( $args );

 if( $cat_posts ) :
 foreach( $cat_posts as $post ) :
 echo '<li>';
 echo '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
 echo '</li>';
 endforeach;
 endif;

 $next = get_categories('hide_empty=0&parent=' . $cat);

 if( $next ) :
 foreach( $next as $cat ) :
 	$category_id = get_cat_ID( $cat->name );
    // Get the URL of this category
    $category_link = get_category_link( $category_id );
 echo '<ul><li><strong><a href="'. $category_link . '">'  . $cat->name . '</a></strong></li>';
 process_cat_tree( $cat->term_id );
 endforeach;
 endif;

 echo '</ul>';
}
?>
</div>