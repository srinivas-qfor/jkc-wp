var gptadslots=[];
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function(){ var gads = document.createElement('script');
    gads.async = true; gads.type = 'text/javascript';
    var useSSL = 'https:' == document.location.protocol;
    gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
    var node = document.getElementsByTagName('script')[0];
    node.parentNode.insertBefore(gads, node);
})();

googletag.cmd.push(function() {

    //Adslot 1 declaration
    gptadslots[1]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[970,90],[728,90]],'div-gpt-ad-110057376862217179-1').setTargeting('pos',['1']).addService(googletag.pubads());

    //Adslot 2 declaration
    gptadslots[2]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[300,600],[300,250]],'div-gpt-ad-110057376862217179-2').setTargeting('pos',['1']).addService(googletag.pubads());

    //Adslot 3 declaration
    gptadslots[3]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[300,600],[300,250]],'div-gpt-ad-110057376862217179-3').setTargeting('pos',['2']).addService(googletag.pubads());

    //Adslot 4 declaration
    gptadslots[4]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[300,600],[300,250]],'div-gpt-ad-110057376862217179-4').setTargeting('pos',['3']).addService(googletag.pubads());

    //Adslot 5 declaration
    gptadslots[5]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[300,600],[300,250]],'div-gpt-ad-110057376862217179-5').setTargeting('pos',['4']).addService(googletag.pubads());

    //Adslot 6 declaration
    gptadslots[6]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[300,600],[300,250]],'div-gpt-ad-110057376862217179-6').setTargeting('pos',['5']).addService(googletag.pubads());

    //Adslot 7 declaration
    gptadslots[7]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[300,600],[300,250]],'div-gpt-ad-110057376862217179-7').setTargeting('pos',['6']).addService(googletag.pubads());

    //Adslot 8 declaration
    gptadslots[8]= googletag.defineSlot('/4011/trb.latimes/jeanknowscars', [[728,90]],'div-gpt-ad-110057376862217179-8').setTargeting('pos',['1']).addService(googletag.pubads());

    googletag.pubads().setTargeting('ptype',['sf']);
    googletag.pubads().enableAsyncRendering();
    googletag.enableServices();
});