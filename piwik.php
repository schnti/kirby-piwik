<?php

$kirby->set('widget', 'piwik', __DIR__ . '/widgets/piwik');

$kirby->set('tag', 'piwikOptOut', array(
	'attr' => array(
		'width',
		'height'
	),
	'html' => function ($tag) {

		if (!c::get('ka.piwik.url') || !c::get('ka.piwik.id')) {
			return '';
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
			'url' => c::get('ka.piwik.url'),
			'id' => c::get('ka.piwik.id'),
			'lang' => site()->language(),
			'width' => $width,
			'height' => $height
		);

		return tpl::load(__DIR__ . DS . 'templates/optOut.php', $data);
	}
));

function piwik()
{

	// check if enabled and config is valid
	if (!c::get('ka.piwik.tracking', false) || !c::get('ka.piwik.url') || !c::get('ka.piwik.id')) {
		return '';
	}

	// check if user is logged in
	if (c::get('ka.piwik.trackingIfLoggedIn', true) && site()->user()) {
		return '';
	}

	$data = array(
		'url' => c::get('ka.piwik.url'),
		'id' => c::get('ka.piwik.id')
	);

	// Return template HTML
	return tpl::load(__DIR__ . DS . 'templates/tracking.php', $data);
}