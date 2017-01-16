<?= l::get('ka.piwik.trackHint'); ?>

<label>
    <input type="checkbox" id="piwikOptOutCheckbox">
    <span id="piwikOptOutText"></span>
</label>

<script>
    window.onload=function(){function e(a){1==a?b.html(c):b.html(d)}function f(a,b){$.ajax({url:"//<?= $url; ?>/index.php?module=API&method=AjaxOptOut."+a+"&format=json",jsonp:"callback",dataType:"jsonp",contentType:"application/json",success:b,error:function(a){console.log(a)}})}var a=$("#piwikOptOutCheckbox"),b=$("#piwikOptOutText"),c="<?= l::get('ka.piwik.trackOn'); ?>",d="<?= l::get('ka.piwik.trackOff'); ?>";f("isTracked",function(b){e(b.value),a.prop("checked",b.value)}),a.click(function(){f(1==this.checked?"doTrack":"doIgnore"),e(this.checked)})};
</script>