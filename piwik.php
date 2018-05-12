<?php

$kirby->set('widget', 'piwik', __DIR__ . '/widgets/piwik');

$kirby->set('tag', 'piwikOptOut', array(
	'attr' => array(
		'width',
		'height'
	),
	'html' => function ($tag) {

		loadTranslation();

		if (!c::get('ka.piwik.tracking', false)) {
			return (c::get('debug', false)) ? l::get('ka.piwik.pluginDisabled') : '';
		}

		if (!c::get('ka.piwik.url') || !c::get('ka.piwik.id')) {
			return l::get('ka.piwik.missingConfig');
		}

		$width = $tag->attr('width');
		$height = $tag->attr('height');

		if (empty($width)) {
			$width = '100%';
		}
		if (empty($height)) {
			$height = '150px';
		}

		$data = array(
			'url'    => c::get('ka.piwik.url'),
			'id'     => c::get('ka.piwik.id'),
			'lang'   => site()->language(),
			'width'  => $width,
			'height' => $height
		);

		return tpl::load(__DIR__ . DS . 'templates/optOut.php', $data);
	}
));

$kirby->set('tag', 'piwikAjaxOptOut', array(
	'attr' => array(),
	'html' => function ($tag) {

		loadTranslation();

		if (!c::get('ka.piwik.tracking', false)) {
			return (c::get('debug', false)) ? l::get('ka.piwik.pluginDisabled') : '';
		}

		if (!c::get('ka.piwik.url') || !c::get('ka.piwik.id')) {
			return l::get('ka.piwik.missingConfig');
		}

		$data = array(
			'url' => c::get('ka.piwik.url')
		);

		if (isset($_SERVER["HTTP_DNT"])) {
			return l::get('ka.piwik.doNotTrack');
		} else {
			return tpl::load(__DIR__ . DS . 'templates/ajaxOptOut.php', $data);
		}
	}
));

function piwik()
{

	// check if enabled and config is valid
	if (!c::get('ka.piwik.tracking', false) || !c::get('ka.piwik.url') || !c::get('ka.piwik.id')) {
		return '';
	}

	// check if user is logged in
	if (!c::get('ka.piwik.trackingIfLoggedIn', true) && site()->user()) {
		return '';
	}

	$data = array(
		'url' => c::get('ka.piwik.url'),
		'id'  => c::get('ka.piwik.id')
	);

	// Return template HTML
	return tpl::load(__DIR__ . DS . 'templates/tracking.php', $data);
}

function loadTranslation()
{

	if (defined('KIRBY')) {
		$site = kirby()->site();
		$code = $site->multilang() ? $site->language()->code() : c::get('ka.piwik.language', 'de');

		try {
			include_once __DIR__ . DS . 'languages' . DS . $code . '.php';
		} catch (ErrorException $e) {
			try {
				include_once __DIR__ . DS . 'languages' . DS . 'de' . '.php';
			} catch (ErrorException $e) {
				throw new Exception("Uniform does not have a translation for the language '$code'.");
			}
		}
	}
}