<?php
namespace Craft;

class WebmentionClient_TargetsFieldType extends BaseFieldType {
	public function getName() {
		return Craft::t('Webmention (targets)');
	}

	public function getInputHtml($name, $value) {
		return craft()->templates->render('webmentionclient/_textarea', array(
			'name'  => $name,
			'value' => $value
		));
	}
}