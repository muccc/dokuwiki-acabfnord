addInitEvent(
  function( ) {
    var pp = document.getElementById( 'ppwrapper' );
    if( !pp ) return false;
    var pix = pp.getElementsByTagName('a');
    for( i=0; i < pix.length ;i++ ) {
	var pixi = pix[i];
	rgb = /(.*?)rgb\((\d+), (\d+), (\d+)\)/.exec(pixi.style.backgroundColor);
	C = 1 - (parseInt(rgb[2])/255);
	M = 1 - (parseInt(rgb[3])/255);
	Y = 1 - (parseInt(rgb[4])/255);
	k = Math.min(C,Math.min(M,Y));
	if (k > 0.23) { fc = "#fafafa"; }
	else { fc = "#151515"; }
	pixi.style.color = fc;
    }
  }
);
