var XD = function(){
    var interval_id,
    last_hash,
    cache_bust = 1,
    attached_callback,
    window = this;

    return {
        postMessage : function(message, target_url, target) {

            if (!target_url) {
                return;
            }

            target = target || parent;  // default to parent

            if (window['postMessage']) {
                target['postMessage'](message, target_url.replace( /([^:]+:\/\/[^\/]+).*/, '$1'));

            } else if (target_url) {
                target.location = target_url.replace(/#.*$/, '') + '#' + (+new Date) + (cache_bust++) + '&' + message;
            }
        }
    };
}();

var parent_url = decodeURIComponent(document.location.hash.replace(/^#/, ''));

function displayInterstitial(interstitialDisplayTimer) {
    XD.postMessage("DISPLAYINTERSTITIAL_" + interstitialDisplayTimer, parent_url, parent);
    return false;
}