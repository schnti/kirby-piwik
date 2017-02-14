<div id="widgetIframe">

    <style>
        .tracking {
            text-align: center;
        }

        .tracking:before {
            content: '';
            width: 20px;
            height: 20px;
            display: inline-block;
            border-radius: 50%;
            background: #d9534f;
            border: solid 1px #a94442;
            margin-right: 8px;
            vertical-align: bottom;
        }

        .enabled:before {
            background: #5cb85c;
            border-color: #3c763d;
        }
    </style>

    <div class="tracking <?= $state; ?>"><?= $stateText; ?></div>

	<?php if (empty($url) || empty($id) || empty($token_auth)): ?>
        <br/>
		<?= $missingConfigWidget; ?>
	<?php else: ?>
        <iframe width="100%" height="250"
                src="//<?= $url; ?>/index.php?module=Widgetize&action=iframe&columns[]=nb_visits&widget=1&moduleToWidgetize=VisitsSummary&actionToWidgetize=getEvolutionGraph&idSite=<?= $id; ?>&period=day&date=yesterday&disableLink=1&widget=1&token_auth=<?= $token_auth; ?>"
                scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
	<?php endif; ?>
</div>