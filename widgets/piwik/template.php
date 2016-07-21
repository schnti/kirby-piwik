<div id="widgetIframe">
    <iframe width="100%" height="250"
            src="//<?= $url; ?>/index.php?module=Widgetize&action=iframe&columns[]=nb_visits&widget=1&moduleToWidgetize=VisitsSummary&actionToWidgetize=getEvolutionGraph&idSite=<?= $id; ?>&period=day&date=yesterday&disableLink=1&widget=1&token_auth=<?= $token_auth; ?>"
            scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
</div>