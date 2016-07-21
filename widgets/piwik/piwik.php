<?php

return array(
    'title' => 'Besucher',
    'html' => function () {

        if (!c::get('ka.piwik.widget', false) || !c::get('ka.piwik.url') || !c::get('ka.piwik.id') || !c::get('ka.piwik.apitoken'))
            return;

        $data = array(
            'url' => c::get('ka.piwik.url'),
            'id' => c::get('ka.piwik.id'),
            'token_auth' => c::get('ka.piwik.apitoken')
        );

        // Return template HTML
        return tpl::load(__DIR__ . DS . 'template.php', $data);
    }
);