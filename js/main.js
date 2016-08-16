audio = document.createElement('audio');
var source_mp3 = document.createElement('source');
var source_ogg = document.createElement('source');

audio.appendChild( source_mp3 );
audio.appendChild( source_ogg );

// http://soundbible.com/871-Chicken.html
source_mp3.src = 'audio/chicken-clucking.mp3';
source_ogg.src = 'audio/chicken-clucking.ogg';


$( audio ).bind('play', function(){
    // playing
    $('html').addClass('clucking');
});

$( audio ).bind('ended', function(){
    // done playing
	$('html').removeClass('clucking');
});


function addCommas(nStr) {
	// http://www.mredkj.com/javascript/nfbasic.html
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

$(document).ready(function() {

$('html').removeClass('no-js');
$('html').addClass('js');

var lastCount = parseInt( $('.count').html().replace(',', '') );

window.setInterval( function(){
	$('progress').load('count_notes.php?blog=thatsmoderatelyraven&post_id=41563238114&echo=1', null, function( data ){
		
		if ( data < lastCount ) {
			data = lastCount;
		}

		milestone = Math.ceil( ((lastCount+0.00001) / 1000) ) * 1000;
		if ( data >= milestone ) {
			audio.load();
			audio.play();
		}

		var total = 500000;
		var percentage = data/total*100;
		$('progress').val( percentage );
		$('.count').html( addCommas(data) );
		$('.percentage').html( percentage.toFixed(2) + '%' );
		$('.to-go').html( addCommas(total-data) );

		lastCount = parseInt(data);

	});
}, 5000 );




});