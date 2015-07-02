var oauth = {
	popup: function(bttn,evnt) {
		evnt.preventDefault();
		console.log(bttn.href);
		var win = $C.windowOpen('about:blank',640,560);
		win.onload = this.onload.bind(this);
		
		//win.location.href = 'http://www.google.co.uk';
		win.location.href = bttn.href;
		
		return false;
	},
	onload: function(win) {

		console.log('winiwin', win);

	}
}