<?php
namespace Craft;

class WebmentionClientService extends BaseApplicationComponent {
	private $queue = array();

	public function addToQueue($endpoint, $source, $target) {
		array_push($this->queue, array(
			'endpoint' => $endpoint,
			'source' => $source,
			'target' => $target
		));
	}

	public function onSaveEntry($event) {
		$entry = $event->params['entry'];
		$fieldTypeName = craft()->fields->getFieldType('WebmentionClient_Targets')->getName();
		$fields = array();
		$targets = array();

		foreach (craft()->fields->getAllFields() as $field) {
			if ($field->getFieldType()->name == $fieldTypeName) {
				array_push($fields, $field);
			}
		}

		foreach ($fields as $field) {
			$handle = $field->handle;
			$urls = explode("\n", trim($entry->$handle));

			$targets = array_merge($targets, array_map('trim', $urls));
		}

		$targets = array_unique($targets);

		foreach ($targets as $target) {
			if ($endpoint = craft()->webmentionClient_lookup->getEndpoint($target)) {
				$this->addToQueue($endpoint, $entry->url, $target);
			}
		}

		$rows = count($this->queue);

		if ($rows > 0) {
			craft()->tasks->createTask('WebmentionClient', 'Processing webmention queue', array(
				'queue' => $this->queue,
				'rows'  => $rows
			));
		}
	}

	public function send($endpoint, $source, $target) {
		$body = http_build_query(array(
			'source' => $source,
			'target' => $target
		));

		$ch = curl_init($endpoint);

		curl_setopt_array($ch, array(
			CURLOPT_HTTPHEADER => array('Content-type: application/x-www-form-urlencoded'),
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $body,
			CURLOPT_RETURNTRANSFER => true
		));

		curl_exec($ch);

		$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);

		return in_array($response, array(200, 202));
	}
}