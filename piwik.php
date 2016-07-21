<?php

$kirby->set('widget', 'piwik', __DIR__ . '/widgets/piwik');

function piwik()
{

	if (!c::get('ka.piwik.tracking', false) || !c::get('ka.piwik.url') || !c::get('ka.piwik.id'))
		return;

	$data = array(
		'url' => c::get('ka.piwik.url'),
		'id' => c::get('ka.piwik.id')
	);

	// Return template HTML
	return tpl::load(__DIR__ . DS . 'template.php', $data);
}