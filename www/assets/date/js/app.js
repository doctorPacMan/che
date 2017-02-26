$App = {
	initialize: function() {
		console.log('app initialize');

		var callback = this.setRange.bind(this),
			ranger = document.getElementById('ranger');
		ranger.addEventListener('input',function(){callback(this.value)});
		this._wraper = document.body.querySelector('section.clndr');
	},
	setRange: function(rng) {
		//console.log(rng);
		this._wraper.setAttribute('data-range',rng);
	}
};
(function(){var onload = $App.initialize.bind($App);
if (["complete","loaded","interactive"].indexOf(document.readyState)>=0) onload();
else document.addEventListener('DOMContentLoaded',onload)})();