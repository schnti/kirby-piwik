window.onload = function () {
    var checkbox = document.querySelector('#piwikOptOutCheckbox');
    var piwikOptOutText = document.querySelector('#piwikOptOutText');

    var piwikOptOutOn = '<?= l::get('ka.piwik.trackOn'); ?>';
    var piwikOptOutOff = '<?= l::get('ka.piwik.trackOff'); ?>';

    ajax('isTracked', function (response) {
        showText(response.value);
        checkbox.checked = response.value;
    });

    checkbox.onclick = function () {
        if (this.checked == true) {
            ajax('doTrack');
        } else {
            ajax('doIgnore');
        }

        showText(this.checked);
    };

    function showText(state) {
        if (state == true) {
            piwikOptOutText.innerHTML = piwikOptOutOn;
        } else {
            piwikOptOutText.innerHTML = piwikOptOutOff;
        }
    };

    // Based on: https://gist.github.com/gf3/132080
    function ajax(api, callback) {
        var url = '<?= $url; ?>/index.php?module=API&method=AjaxOptOut.' + api + '&format=json';
        var unique =  Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
        // INIT
        var name = "_jsonp_" + unique;
        if (url.match(/\?/)) url += "&callback="+name;
        else url += "?callback="+name;

        // Create script
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = url;

        // Setup handler
        window[name] = function(data){
            if(callback != undefined) callback.call(window, data);
            document.getElementsByTagName('head')[0].removeChild(script);
            delete window[name];
        };

        // Load JSON
        document.getElementsByTagName('head')[0].appendChild(script);
    };
};