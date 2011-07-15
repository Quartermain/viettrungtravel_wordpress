=== IM Online ===
Contributors: mutube
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=martin%2efitzpatrick%40gmail%2ecom&item_name=Donation%20to%20mutube%2ecom&currency_code=USD&bn=PP%2dDonationsBF&charset=UTF%2d8
Tags: im, online status, status, msn, skype, skype-button, yahoo, aim, jabber, widget
Requires at least: 2.0.2
Tested up to: 2.6
Stable tag: 4.7

IM Online shows your current online status on your blog. Currently supports AOL, MSN, Yahoo!, Jabber, Skype and ICQ. Widget & Plugin support.

== Description ==

A neat little Wordpress plugin to show your current online status on your blog, with Widget support for those that use them. The plugin is powered via onlinestatus.org and supports most IM services including AOL, MSN, Yahoo!, Jabber (inc. Google Talk), Skype and ICQ. Different servers and icon-sets are available so it should be possible to find something to match your own blog.

You can show as many or as few IM network icons as you like and all options are configurable through the control panel. The [onlinestatus.org](http://onlinestatus.org) servers do most of the hard work here & are worth as visit if you’re looking for a status indicator for a non-Wordpress site.

You can now include your online status in posts using [imonline] tag in any page/post. The tagline link to my website (mutube.com) may also be removed by using imonline_status( false ) to call the plugin. (Note: it is hidden by default when outputting into posts).

== Installation ==

= Widget Installation =

1. Unzip the downloaded package and drop the IM-Online folder in your Wordpress plugins folder
1. Log into your WordPress admin panel
1. Go to Plugins and “Activate” the plugin
1. Go to Presentation, Widgets
1. Drag the IM Online widget onto your sidebar panel
1. Click the Widget-Options button (small blue-topped square)
1. Enter the title for your Widget
1. Return to the Widget panel and click “Save changes »”
1. Go to Options, then IM Online
1. Enter your account details for each service you use
1. Click “Save changes »”
1. Check your blog to see if it’s working!

= Plugin Installation =

1. Unzip the downloaded package and drop the IM-Online folder in your Wordpress plugins folder
1. Log into your WordPress admin panel
1. Go to Plugins and “Activate” the plugin
1. Go to Options, then IM Online
1. Enter your account details for each service you use
1. Click “Save changes »”
1. Add <?php imonline_status(); ?> to your Wordpress theme source where you want the IM status icons to appear on your blog (sidebar.php is recommended).
1. Check your blog to make sure it’s working!

== Frequently Asked Questions ==

= Why am I showing as Offline/Disabled? =

Check your privacy settings. Normally (well, almost always) problems with correct status are caused by the settings in your IM application. In order for this plugin to work you need to set your privacy to "Viewable by All" or your softwares equivalent.

= Why is my status not updating? =

Wait a while. To speed up display your Online Status is cached by the plugin. If you hold your mouse over the status icon it should inform you how long until the next update.

= What's wrong with Google Talk? =

For some reason it doesn't work with the Jabber network settings. The status is retrieved from [onlinestatus.org](onlinestatus.org) who were aware of the problem last time I asked. Unfortuantely the developers appear to have disappeared.

= What format should I enter my account details in? =

* AIM: username
* ICQ: ICQ# ( 11077801 )
* IRC: username@server.net ( mutube@irc.freenode.net )
* Jabber: username@jabberserver.net
* MSN: username@server.com ( username@hotmail.com )
* Skype: username
* Yahoo!: username

= Can I change the icons used to show status? =

As of v2.5 you can now download and install Icon Packs to change the appearance of your IM status icons.  If you're artistically minded you can also design your own from scratch. 

* [Default Pack](http://www.mutube.com/downloads/wordpress/im-online-icons-default.zip)
* [Pack #1](http://www.mutube.com/downloads/wordpress/im-online-icons-1.zip)
* [Pack #2](http://www.mutube.com/downloads/wordpress/im-online-icons-2.zip)
* [Pack #3](http://www.mutube.com/downloads/wordpress/im-online-icons-3.zip)

To install simply unzip the downloaded file and copy the "images" folder into your /plugins/im-online folder. That's it!

= How can I make my own Icon Packs? =

Of course, you're also able to design your own if you wish.  Simply create an online, offline & unknown-status icon for each IM service you use and then save them with the appropriate filename in GIF format.

If you've created your own packs and want to share them with other IM Online users, [send them to me](mailto:martin.fitzpatrick@mutube.com) and I'll post them here with full credit.

= Thanks =

The following people provide and maintain the OSI servers against which IM Online checks your status. Without their services this plugin would not work so please show your support.

* [the Server Net Hosting](http://www.the-server.net/)
* [Chris Earl](http://www.chrissearle.org/)
* [MSIT Group Portal](http://www.msitgroup.co.uk/)
* [Trial & Error](http://www.techno-st.net/)
* [danvic Ltd.](http://www.danvic.co.uk/)
* [Joker Solutions](http://www.joker-solutions.net/)

== Screenshots ==

1. Example status display.

== To Do ==

Old style image lookups (without caching)
Network's own icon methods

== Change Log  ==

* 4.6 Fixed slowdown in admin area, caused by WordPress calling the Widget when in admin (Why do this? I have no idea).
* 4.5 Updated the onlinestatus.org server lists, checked current listings all work.