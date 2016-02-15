var playTime;
var videoTitle; 
var enableAudio = false;
var adsCompleted = true;
var videoCompleted = true;
var playerParams;
var playerObj;
function receiveOoyalaEvent(player, messageBus, params) {
    //When Player is created
    /*messageBus.subscribe(OO.EVENTS.PLAYER_CREATED, 'playerCreated', function()
    { console.log("PlayerCreated"); });*/
    //When Player is initialized and ready to play.

    playerParams = params;
    playerObj = player;
    messageBus.subscribe(OO.EVENTS.PLAYBACK_READY, 'playerReady', function()
    { onPlayBackReady(player); });

    //When Player starts playing
    messageBus.subscribe(OO.EVENTS.PLAY, 'play', function()
    { onPlayStart(player); });

    //When Player starts playing
    messageBus.subscribe(OO.EVENTS.PLAYING, 'playing', function()
    { onPlaying(player); });

    //When volume needs to be changed
    messageBus.subscribe(OO.EVENTS.CHANGE_VOLUME, 'volumeChanged', function()
    { onVolumeChanged(player); });

    //When preroll ad completes playing
    messageBus.subscribe(OO.EVENTS.WILL_PLAY_ADS, 'adsStarted', function()
    { onAdsPlayStart(player); });

    //When preroll ad completes playing
    messageBus.subscribe(OO.EVENTS.ADS_PLAYED, 'adsPlayed', function()
    { onAdsPlayed(player); });

    //When volume needs to be changed
    messageBus.subscribe(OO.EVENTS.PLAYED, 'played', function()
    { onPlayed(player); });
}

function onPlayBackReady(player) {
    //console.log("PlayerReady");
    //Preroll:[Video name]
    //MainVideo:[video name]
    //For Auto plays:
    //Auto:Preroll:[Video name]
    //Auto:MainVideo:[video name]
    videoTitle = player.getTitle();

    if (videoTitle == null)
        videoTitle = "Homepage";
        
    if (playerParams.autoplay == 1)
        videoTitle = "AUTO:MainVideo:" + videoTitle;
    else
        videoTitle = "MainVideo:" + videoTitle;

    if (playerParams != null && playerParams.volumeLevel != null) {
        if (typeof player.setVolume == 'function') {
            if (typeof Modernizr != 'undefined') {
                if (!Modernizr.touch && playerParams.muteOnLoad != null && playerParams.muteOnLoad == "true") {
                    player.setVolume("0");
                    if (!(jQuery('#playerWrapper').find('#ad-overlay').length))
                        jQuery('#playerWrapper').prepend('<div id="ad-overlay"><div id="ad-icon-container"><a href="javascript:PlayWithAudio();"><span id="ad-icon"></span></a></div></div>');
                }
                else {
                    player.setVolume(0.2);
                }
            }
            else {
                if (playerParams.muteOnLoad != null && playerParams.muteOnLoad == "true") {
                    player.setVolume("0");
                    if (!(jQuery('#playerWrapper').find('#ad-overlay').length))
                        jQuery('#playerWrapper').prepend('<div id="ad-overlay"><div id="ad-icon-container"><a href="javascript:PlayWithAudio();"><span id="ad-icon"></span></a></div></div>');
                }
                else {
                    player.setVolume(0.2);
                }
            }
        }
    }
}
function onPlayStart(player) {
    videoCompleted = true;
}

function onPlaying(player) {
    if (!adsCompleted)
        return;
    if (!videoCompleted)
        return;
    //console.log("Playing");
    playTime = player.getDuration();
    videoTitle = player.getTitle();
    if (videoTitle == null)
        videoTitle = "Homepage";
        
    if (playerParams.autoplay == 1)
        videoTitle = "AUTO:MainVideo:" + videoTitle;
    else
        videoTitle = "MainVideo:" + videoTitle;
        
    if (typeof omnitureVideoTrack == 'function')
        omnitureVideoTrack('oVideoType', { "title": videoTitle, "playTime": playTime, "type": "Main Video" });

    if (enableAudio) {
        var counter = 0;
        while (player.getVolume() <= 0 && counter < 100) {
            if (typeof player.setVolume == 'function') {
                player.setVolume(0.2);
                //console.log(player.getVolume());
            }
            counter++;
        }
    }
    videoCompleted = false;
}

function onVolumeChanged(player)
{
    //console.log("Volume Changed : " + player.getVolume());     
}

function onAdsPlayStart(player)
{
    adsCompleted = false;
    videoCompleted = true;

    videoTitle = player.getTitle();

    if (videoTitle == null)
        videoTitle = "Homepage";

    if (playerParams.autoplay == 1)
        videoTitle = "AUTO:Preroll:" + videoTitle;
    else
        videoTitle = "Preroll:" + videoTitle;

    //console.log("Ads Started");
    if (typeof omnitureVideoTrack == 'function') {
        omnitureVideoTrack('oVideoType', { "title": videoTitle, "playTime": "15", "type": "Preroll" });
    }
    if (enableAudio) {
        var counter = 0;
        while (player.getVolume() <= 0 && counter < 100) {
            if (typeof player.setVolume == 'function') {
                player.setVolume(0.2);
                //console.log(player.getVolume());
            }
            counter++;
        }
    }
}

function onAdsPlayed(player) {
    adsCompleted = true;
    //console.log("Ads Played");
    if (typeof omnitureVideoTrack == 'function') {
        omnitureVideoTrack('oVideoCompletes', { "title": videoTitle, "playTime": "15", "type": "Preroll" });
    }
}

function onPlayed(player)
{
    //console.log("Played");
    if (typeof omnitureVideoTrack == 'function') {
        omnitureVideoTrack('oVideoCompletes', { "title": videoTitle, "playTime": playTime, "type": "Main Video" });
    }
    videoCompleted = true;
}

function playVideo(embedCodeString) {
    if (playerParams != null && playerParams.adSetCode != null) {
        //console.log("play video1");
        playerObj.setEmbedCode(embedCodeString, { "adSetCode": playerParams.adSetCode });
    }
    else {
        //console.log("play video");
        playerObj.setEmbedCode(embedCodeString);
    }
    playerObj.play();
    //console.log(embedCodeString + " : " + playerObj.getEmbedCode());
    window.scrollTo(0, 0);
    PlayWithAudio();
}

function playVideoAndKeepPosition(embedCodeString) {
    if (playerParams != null && playerParams.adSetCode != null) {
        //console.log("play video1");
        playerObj.setEmbedCode(embedCodeString, { "adSetCode": playerParams.adSetCode });
    }
    else {
        //console.log("play video");
        playerObj.setEmbedCode(embedCodeString);
    }
    playerObj.play();
    //console.log(embedCodeString + " : " + playerObj.getEmbedCode());
    PlayWithAudio();
}

function PlayWithAudio() {
    jQuery('#playerWrapper').find('#ad-overlay').hide();
 
    if (playerObj.getEmbedCode() != null) {
        playerObj.setEmbedCode(playerObj.getEmbedCode(), { "adSetCode": playerParams.adSetCode });
        playerObj.play();
    }
    else {
        playerObj.seek(0);
    }
    enableAudio = true;
}