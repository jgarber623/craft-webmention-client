# Craft Webmention Client Plugin

This plugin for the [Craft CMS](http://buildwithcraft.com/) allows you to send [webmentions](http://indiewebcamp.com/webmention) to other websites. From the IndieWebCamp wiki:

> Webmention is a modern update to Pingback, using only HTTP and x-www-urlencoded content rather than XMLRPC requests.

This plugin provides a client for sending notifications to others that your entry has mentioned a URL on the receiver's website. More information on the webmention protocol can be found at [http://webmention.org/](http://webmention.org/).


## Installation

To install the Webmention Client plugin, do the following:

1. Move the `webmentionclient` folder to your `craft/plugins` folder.
2. In the Craft control panel, go to Settings > Plugins and install the Webmention Client plugin.

That's it!


## Usage

### Create a new "Webmention (targets)" Field

![](http://f.cl.ly/items/1s473T0m0r292p063j1F/create-new-webmention-field.png)

First, create a new field and select "Webmention (targets)" as the Field Type. In the example screenshot above, we're using "Mentioned URLs" as the field's name.

After creating the new field, add it to the Field Layout for one or more of your site's Entry Types.

### Create a new entry

![](http://f.cl.ly/items/1E1q3s250b1X2Y3w2a1b/add-mentioned-urls-to-entry.png)

In your newly-created field ("Mentioned URLs" above), add the URLs–one per line—mentioned in the entry's body field (or fields). When you save the entry, the plugin will detect webmention support for each URL and send a notification as necessary.

In the example screenshot above, the URL `http://adactio.com/journal/6495/` is referenced in the body and added to the list of mentioned URLs below. When this entry is saved, the plugin will ping that URL, looking for a webmention endpoint. If one is found, the plugin will send a webmention to that endpoint, notifying Jeremy that someone has referenced his work.


## Acknowledgements

The core functionality of this plugin is based heavily on [Aaron Parecki](https://github.com/aaronpk)'s [mention-client-php](https://github.com/indieweb/mention-client-php).

Additionally, the plugin makes use of the following utility methods:

- [parseHeaders](http://www.php.net/manual/en/function.http-parse-headers.php#111226)
- [relativeToAbsoluteUrl](http://stackoverflow.com/a/4444490)

Finally, many thanks to [Trevor Davis](https://github.com/davist11) for his Craft plugin development expertise.