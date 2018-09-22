<?= l::get('ka.piwik.trackHint'); ?>

<label>
    <input type="checkbox" id="piwikOptOutCheckbox">
    <span id="piwikOptOutText"></span>
</label>
<script>
    window.onload=function(){var e=document.querySelector("#piwikOptOutCheckbox"),o=document.querySelector("#piwikOptOutText"),t="<?= l::get('ka.piwik.trackOn'); ?>",n="<?= l::get('ka.piwik.trackOff'); ?>";function c(e){o.innerHTML=1==e?t:n}function a(e,o){var t="<?= $url; ?>/index.php?module=API&method=AjaxOptOut."+e+"&format=json",n=Math.floor(65536*(1+Math.random())).toString(16).substring(1);var c="_jsonp_"+n;t.match(/\?/)?t+="&callback="+c:t+="?callback="+c;var a=document.createElement("script");a.type="text/javascript",a.src=t,window[c]=function(e){void 0!=o&&o.call(window,e),document.getElementsByTagName("head")[0].removeChild(a),delete window[c]},document.getElementsByTagName("head")[0].appendChild(a)}a("isTracked",function(o){c(o.value),e.checked=o.value}),e.onclick=function(){1==this.checked?a("doTrack"):a("doIgnore"),c(this.checked)}};
</script>