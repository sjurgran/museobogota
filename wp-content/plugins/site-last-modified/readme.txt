=== Site Last Modified ===
Contributors: exed internet
Version: 1.0.3
Tags: website info, modified, last, date, time
Stable tag: tags/1.0.3
Requires at least: 2.5
Tested up to: 3.5
License: GPLv2 or later

Adds the possibility to display the date and/or time the website was last modified,
in template, or through shortcode. 

== Description ==
Adds the possibility to display the date and/or time the website was last modified,
in template, or through shortcode. 

The plugin uses the timestamp of the last modified post for this information.

Please note, this plugin does not show the specific date per post, there are other plugins for that feature.

Requires at least WordPress 2.5 and php 5.

= Contact =
In case of suggestions or improvements please contact EXED at service@exed.nl, or through the GitHub repository (see below).

= More information =
Read the following items for more information:

* Follow EXED internet on [Facebook](https://www.facebook.com/EXEDInternet), [Twitter](https://twitter.com/exedinternet) and our [blog](http://blog.exed.nl) *(Dutch only)*
* Other WordPress Plugins by EXED internet. - http://profiles.wordpress.org/exed-internet/
* EXED internet official website - [http://www.exed.nl](http://www.exed.nl?utm_source=wordpress&utm_medium=social%2Bmedia)

== Installation ==
1. Download the code from Wordpress or GitHub https://github.com/exed/WP-Site-Last-Modified/archive/1.0.zip
2. Upload `site-last-modified.php` to the `/wp-content/plugins/` directory.
3. Activate the plugin through the `Plugins` menu in WordPress.

== Configuration ==
Custom date / time formats can be passed into the function or into the shortcode,
see <http://php.net/date> for possible values.

= Examples =

**Template**

Place `<?php site_last_modified(); ?>` in your templates.  
Dutch date/time example: `<?php site_last_modified('l j F Y, H.i.s'); ?>`

**Shortcode**

Use `[site_last_modified]` directly in your post.  
Dutch date/time example: `[site_last_modified date_format="l j F Y, H.i.s"]`

== Frequently Asked Questions ==
Does this plugin support a shortcode?  
A:  Yes, this is `[site_last_modified]`. You can add a custom date format, e.g. : `[site_last_modified date_format="Y-m-d H:i:s"]`

Where can I find valid time/date formats?  
A: http://php.net/date

How can I implement this date in my template?  
A: `<?php site_last_modified(); ?>`.  You can add a custom date format, e.g. : `<?php site_last_modified( "Y-m-d H:i:s" );?>`

== Changelog ==
= 1.0 =
Version 1.0: first release, supplying template function and shortcode

= 1.0.1 =
Improved readme.txt, no code changes

= 1.0.2 =
Improved readme.txt, no code changes

= 1.0.3 =
Improved readme.txt, no code changes

== Upgrade Notice ==

= 1.0.1 =
No changes required

= 1.0.2 =
No changes required

= 1.0.3 =
No changes required

== Screenshots ==
-
