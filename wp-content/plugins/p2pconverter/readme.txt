=== p2pConverter===
Author: Brian D. Goad (bbbco)
Author URI: http://www.briandgoad.com/blog
Plugin URI: http://www.briandgoad.com/blog/p2pConverter
Tags: manage, edit, page, pages, admin, plugin, convert, post, posts, change, p2p
Requires at least: 2.5
Tested up to: 2.7.1
Stable tag: 0.8

== Description ==
Converts either a static Page into a Post, or a Post into a static Page! Depending on what type you want to convert, click on Posts or Pages. In the main table of all the Posts or Pages listed, you will see an extra column, with a Convert to Post! or Convert to Page! option. If you want to convert a Page or a Post to the either, click that button. Or you can click the Convert button while editing a Post or Page right next to the Delete and Publish buttons.  A p2pConverter role capability prevents unwanted users from converting pages (i.e. only Administrators and Editors have this ability to begin with), which can be adjusted by using a Role Manager plugin.

== Installation ==
Copy the `p2pConverter` directory to your plugins directory and activate the p2pConverter
plugin from WordPress, and volia! You will now be able to convert!

== Frequently Asked Questions ==
None yet!
[Ask a question] mailto: bdgoad (at) gmail (dot) com

== Future Plans ==
* Incorporate bulk managemnet system per request (any advice in hooking into the new Bulk management system would be welcome!)

== Version History ==
= Version 0.8 =
* Layout adjustment for 2.7(.1)
* Minor tweaks

= Version 0.7 =
* AJAX-ified things. 
* Script.aculo.us-ed the Manage section.
* OOP-ed the code

= Version 0.6 =
* Can convert post/page while in Edit Mode (located in bottom right side bar)
* Works nicer when using the search bar to find specific posts/pages
* Easier to mass manage
* Now includes own Role Capability, which automatically defaults to Administrators and Editors (can be adjusted using Role Manager plugin).

= Version 0.5 =
* As per request, Convert! option only available to roles with the ability to Delete Posts and/or Pages
* Included comments in my plugin
* Tab structured code

= Version 0.4 =
* Integrated title of Post/Page into prompt

= Version 0.3 =
* Integrated with default css
* Included prompt to ensure user accuracy

= Version 0.2 =
* Initial work on plugin
* Including scompt's ManageCustomPages

= Version 0.1 =
* Idea / Concept formulation

== Special Thanks ==
Thanks to scompt for his ManageCustomPages plugin (now included in the Wordpress Core as of 2.5!) [http://scompt.com/projects/manage-pages-custom-columns-in-wordpress]
and his tutorial on including extra columns in the posts section [http://scompt.com/archives/2007/10/20/adding-custom-columns-to-the-wordpress-manage-posts-screen]