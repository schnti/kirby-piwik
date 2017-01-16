<?= l::get('ka.piwik.trackHint'); ?>

<label>
    <input type="checkbox" id="piwikOptOutCheckbox">
    <span id="piwikOptOutText"></span>
</label>

<script>
    window.onload = function () {
        var checkbox = $('#piwikOptOutCheckbox');
        var piwikOptOutText = $('#piwikOptOutText');

        var piwikOptOutOn = '<?= l::get('ka.piwik.trackOn'); ?>';
        var piwikOptOutOff = '<?= l::get('ka.piwik.trackOff'); ?>';

        ajax('isTracked', function (response) {
            showText(response.value);
            checkbox.prop('checked', response.value);
        });

        checkbox.click(function () {
            if (this.checked == true) {
                ajax('doTrack');
            } else {
                ajax('doIgnore');
            }

            showText(this.checked);
        });

        function showText(state) {
            if (state == true) {
                piwikOptOutText.html(piwikOptOutOn);
            } else {
                piwikOptOutText.html(piwikOptOutOff);
            }
        }

        function ajax(api, ok) {
            $.ajax({
                url: '//<?= $url; ?>/index.php?module=API&method=AjaxOptOut.' + api + '&format=json',
                jsonp: 'callback',
                dataType: 'jsonp',
                contentType: 'application/json',
                success: ok,
                error: function (error) {
                    console.log(error);
                }
            });
        }
    };
</script>