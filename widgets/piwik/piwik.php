<?php

if (!c::get('ka.piwik.widget', false)) {
	return false;
}

return array(
	'title' => 'Besucher',
	'html'  => function () {

		loadTranslation();

		$data = array(
			'url'                 => c::get('ka.piwik.url'),
			'id'                  => c::get('ka.piwik.id'),
			'token_auth'          => c::get('ka.piwik.apitoken'),
			'state'               => (!c::get('ka.piwik.tracking', false)) ? 'disabled' : 'enabled',
			'stateText'           => (!c::get('ka.piwik.tracking', false)) ? l::get('ka.piwik.widget.trackOff') : l::get('ka.piwik.widget.trackOn'),
			'missingConfigWidget' => l::get('ka.piwik.widget.missingConfig')
		);

		// Return template HTML
		return tpl::load(__DIR__ . DS . 'template.php', $data);
	}
);