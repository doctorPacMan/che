function apiRequest() {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', './?s', true);
	xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
	xhr.setRequestHeader('Content-Type','application/json;charset=utf-8');
	xhr.onreadystatechange = function() {
		if(xhr.readyState!=4) return;
		if(xhr.status!=200) return console.log(xhr.status);
		console.log(xhr);
	}
	xhr.send(null);
};
console.log('duel/js.js')
var Gameboard = function() {return this.initialize.apply(this,arguments)};
Gameboard.prototype = {
initialize: function(){
	var btns = document.querySelectorAll('#petpanel > button');
	btns[0].addEventListener('click',this.clickSpell.bind(this,0));
	btns[1].addEventListener('click',this.clickSpell.bind(this,1));
	btns[2].addEventListener('click',this.clickSpell.bind(this,2));
	console.log('Gameboard initialize');
},
clickSpell: function(id) {
	console.log('clickSpell',id);
	apiRequest();
}
};
document.addEventListener('DOMContentLoaded',function(){console.log(new Gameboard)});