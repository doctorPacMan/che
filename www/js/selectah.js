document.addEventListener('DOMContentLoaded',function(){
	var s = document.querySelectorAll('.selectah');
	for(var i=0;i<s.length;i++) var n = new Selectah(s[i]);
	console.log(n)
});
var Selectah = function() {return this.initialize.apply(this,arguments)};
Selectah.prototype = {
initialize: function(n){
	var wraper = n,
		select = wraper.getElementsByTagName('select')[0],
		option = select.getElementsByTagName('option'),
		option = Array.prototype.slice.call(option);

	var prev = wraper.getElementsByTagName('ol')[0],
		list = this.createList(option);
	if (!prev) wraper.appendChild(list);
	else wraper.replaceChild(list,prev);

	console.log('Selectah',list);
},
createList: function(option) {
	var opts = Array.prototype.slice.call(option),
		node = document.createElement('ol'),
		item = document.createElement('li');

	var op, nt, li;
	for(var i=0;i<opts.length;i++) {
		op = opts[i];
		nt = op.textContent.trim();
		li = item.cloneNode(false);
		li.appendChild(document.createTextNode(nt));
		node.appendChild(li);
		console.log(nt);
	}
	return node;
}
}