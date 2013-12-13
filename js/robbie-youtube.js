// Params
var done        = false;
var yt_video_id = $('#yt-video').html(); // The video id to play
var player;

// Loads the IFrame Player API code asynchronously.
var ga   = document.createElement('script');
ga.type  = 'text/javascript';
ga.async = false;
ga.src   = 'http://www.youtube.com/player_api';
var s    = document.getElementsByTagName('script')[0]; // Get the first script on the page
s.parentNode.insertBefore(ga, s); // Insert this script before it

// When the thumbnail is clicked, instantiate a new player
$('#thumbnail').click(function() {

	player = new YT.Player('player', {
	  height: '390',
	  width: '640',
	  videoId: yt_video_id,
	  events: {
	    'onReady': onPlayerReady,
	    'onStateChange': onPlayerStateChange
	  }
	});
	
});

// When the player is ready, start playing
function onPlayerReady(evt) {
	console.log('onPlayerReady');
    player.playVideo();
}

function onPlayerError(evt) {
    console.log('onPlayerError',evt);
}

function onPlayerStateChange(evt) {
    console.log('onPlayerStateChange', evt);
}
