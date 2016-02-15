(function(xd){
    "use strict";
    if('undefined' !== typeof xd && !!xd.receiveMessage) {
        /*
         * Check post message and call
         * Assumed post message response: [int, adType]. E.g. [1, 'tss'], [188, 'STM']
         * */
        xd.receiveMessage(function(message) {
            var postMessageAdType = message.data[1];

            // IE converts to string.. this is the case for ie 11 and down ( haven't tested higher ).
            // Check if tss is present and parse accordingly and rebuild message object to pass
            if (navigator.appName == 'Microsoft Internet Explorer') {

                var messageStr = String(message.data),
                    idxTss = messageStr.indexOf(',tss');

                if (idxTss > -1) {
                    postMessageAdType = "tss";
                    var message = {
                        'data' : [
                            messageStr.substr(0,idxTss),
                            postMessageAdType
                        ]
                    };
                }
            }

            if ('function' === typeof xd[postMessageAdType]) {
                xd[postMessageAdType](message);
            }
        }, 'http://ad.doubleclick.net');
    } else {
        console.error('Can call CD receiveMessage. XD and or Receive Message does not exits.');
    }
})(XD);