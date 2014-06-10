# Craft Webmention Client Plugin

This plugin for the [Craft CMS](http://buildwithcraft.com/) allows you to send [webmentions](http://indiewebcamp.com/webmention) to other websites. From the IndieWebCamp wiki:

> Webmention is a modern update to Pingback, using only HTTP and x-www-urlencoded content rather than XMLRPC requests.

This plugin provides a client for sending notifications to others that your entry has mentioned a URL on the receiver's website. More information on the webmention protocol can be found at [http://webmention.org/](http://webmention.org/).


## Installation

To install the Webmention Client plugin, do the following:

1. Move the `webmentionclient` folder to your `craft/plugins` folder.
2. In the Craft control panel, go to Settings > Plugins and install and enable the Webmention Client plugin.

That's it!


## Usage

### Create a new Webmention (targets) Field

![](http://f.cl.ly/items/0A2w3O0e2x1a2L2c0b3z/Image%202014-06-10%20at%203.44.44%20PM.png)

After creating the new field ("Mentioned URLs" in the example above, add the field to the Field Layout for one or more of your site's Entry Types.

### Create a new entry

![](http://f.cl.ly/items/0J0n3r323j3I362A0X2Z/Image%202014-06-10%20at%203.51.46%20PM.png)

In this new field ("Mentioned URLs" above), add the URLs to websites mentioned in the entry's body field (or fields). When you save the entry, the plugin will detect webmention support for each URL and send a notification as necessary.


## Acknowledgements

The core functionality of this plugin is based heavily on [Aaron Parecki](https://github.com/aaronpk)'s [mention-client-php](https://github.com/indieweb/mention-client-php).

Additionally, the plugin makes use of the following utility methods:

- [parseHeaders](http://www.php.net/manual/en/function.http-parse-headers.php#111226)
- [relativeToAbsoluteUrl](http://stackoverflow.com/a/4444490)

Finally, many thanks to [Trevor Davis](https://github.com/davist11) for his Craft plugin development expertise.