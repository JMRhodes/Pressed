/**
 *  Custom JS Scripts
 *
 * @package Presser
 */

 /**
 *  Initialize FluidVids
 */
var fluidVids = (function () {

    var pub = {}; // public facing functions

    pub.init = function() {

        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});

    };

    return pub;

}());

 /**
 *  Initialize Functions
 */
( function() {
	
    fluidVids.init();
	
})();