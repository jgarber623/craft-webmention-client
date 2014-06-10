<?php
namespace Craft;

class WebmentionClientPlugin extends BasePlugin {
	function getName() {
		return Craft::t('Webmention Client');
	}

	function getVersion() {
		return '1.0.0';
	}

	function getDeveloper() {
		return 'Jason Garber';
	}

	function getDeveloperUrl() {
		return 'http://sixtwothree.org';
	}

	function init() {
		craft()->on('entries.saveEntry', function(Event $event) {
			craft()->webmentionClient->onSaveEntry($event);
		});
	}
}