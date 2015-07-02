$C = {};
$C.windowOpen = function(src,wdt,hgt,name) {
	var p = {
		top: 120,
		left: 120,
		width: wdt || 640,
		height: hgt || 480,
		status: 'no',
		menubar: 'no',
		toolbar: 'no',
		location: 'no',
		resizable: 'yes',
		scrollbars: 'no',
		directories: 'no'
	}, params = '';
	for(var i in p) params += (params.length ? ',' : '') + (i+'='+p[i]);
	console.log(params);
	
	var neowin = window.open(src, name || 'neowin', params);
	neowin.focus();
	return neowin;
}