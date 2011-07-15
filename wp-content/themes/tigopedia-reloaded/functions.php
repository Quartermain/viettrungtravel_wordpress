<?php

if ( function_exists('register_sidebars') )
 register_sidebars(2,array(
        'before_widget' => '<div id="%1$s" class="wp-widget %2$s">',
    'after_widget' => '</div>',
 'before_title' => '<div class="wp-widget-title">',
        'after_title' => '</div>',
    ));

function widget_mytheme_search() {
?>
       <div class="search-widget-title">Search</div>
       <div class="search-widget">
            <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
            <input type="text" name="s" id="s" value="Search, Type and Hit Enter" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
            </form>
       </div>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');
?>