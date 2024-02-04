<?php
/**
 * PluginName  : Discord Notifications Helper
 * Author 	   : Florian.Prache
 * Description : Make a notifications from any php projects to discord (embed with lot of options, and classic send)
 *
 * @version    1.0.0
 * @link       https://altitude-dev.com/fr
 * @copyright  Copyright (c) 2024 Florian Prache
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 */

/**
 * Your Webhooks URI
 * @param  string  $canalName
 * @param  string  $uri
 */
if (! function_exists('WebhooksList')) {
	function WebhooksList(){
		$webhook = [
			'general' => 'ADD YOUR OWN WEBHOOK URI',
			'others'  => 'ADD YOUR OWN WEBHOOK URI'
		];
		return $webhook;
	}
}

/**
 * Adds a message to chanel.
 * @param  string  $message
 * @param  string $webhookRequest
 */
if (! function_exists('discordMsg')) {
    function discordMsg(string $message, string $webhookRequest)
    {
		$webookUsed = WebhooksList();
		if (array_key_exists($webhookRequest, $webookUsed)) {
			$data = [
				'content'  => $message
			];
			$headers = get_headers($webookUsed[$webhookRequest]);
			if (strpos($headers[0], '404') === false && strpos($headers[0], '401') === false) {
				return discordTrigger($data, $webookUsed[$webhookRequest]);
			}else{
				return "error, 404 webhook!";
			}
		}else{
			return "error, webhook dont exist!";
		}
	}
}

/**
 * Adds a message embed to chanel.
 * @param  array  $options
 * @param  string $webhookRequest
 */
if (! function_exists('discordEmbed')) {
    function discordEmbed(array $options, string $webhookRequest)
    {
		$webookUsed = WebhooksList();
		if (array_key_exists($webhookRequest, $webookUsed)) {
			$headers = get_headers($webookUsed[$webhookRequest]);
			if (strpos($headers[0], '404') === false && strpos($headers[0], '401') === false) {
        		return discordTriggerEmbed($options, $webookUsed[$webhookRequest]);
			}else{
				return "error, 404 webhook!";
			}
		}else{
			return "error, webhook dont exist!";
		}
	}
}

/**
 * CURL Send to classic message not embedded or markdown
 */
if (! function_exists('discordTrigger')) {
	function discordTrigger($data, $webhook) {
		$Contexte = json_encode([
			"content" => $data['content']
		]);
		$ch = curl_init($webhook);
		$options = [
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $Contexte,
			CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => false
		];
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
}

/**
 * CURL Send to Embed to Discord
 */
if (! function_exists('discordTriggerEmbed')) {
	function discordTriggerEmbed($data, $webhook) {
		$discordEmbedData = json_encode([
			// content
			"content"  => $data['content'],
			// Username
			"username" => $data['username'],
			// Avatar
			"avatar_url" => $data['avatar_url'],
			// Text-to-speech
			"tts" => $data['tts'],
			// File upload
			"file" => $data['file'],
			// Embeds Array
			"embeds" => [
				[
					// Embed Title
					"title" => $data['embeds']['title'],
					// Embed Type
					"type" => $data['embeds']['type'],
					// Embed Message
					"description" => $data['embeds']['description'],
					// URL of title
					"url" 	=> $data['embeds']['url'],
					// Timestamp
					"timestamp" => $data['embeds']['timestamp'],
					// Embed
					"color" => $data['embeds']['color'],
					// Footer
					"footer" => [
						"text" => $data['embeds']['footer']['text'],
						"icon_url" => $data['embeds']['footer']['icon_url']
					],
					// Image to send
					"image" => [
						"url" => $data['embeds']['image']
					],
					// Thumbnail
					"thumbnail" => [
					"url" => $data['embeds']['thumbnail']
					],
					// Author
					"author" => [
						"name" => $data['embeds']['author']['authorName'],
						"url" =>  $data['embeds']['author']['author_uri']
					],
					// Fields
					"fields" => array_map(function($field) {
						return [
							'name' => $field['name'],
							'value' => $field['value'],
							'inline' => $field['inline']
						];
					}, $data['embeds']['fields'])
				]
			]
		]);
		$ch = curl_init($webhook);
		$options = [
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $discordEmbedData,
			CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => false
		];
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
}