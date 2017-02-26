/* Фиксирует верхнюю (дни) и левую (комнаты) секции в таблице */
function fixGridHeaders(){
	var wrapper = document.getElementById('daygrid');
	wrapper.addEventListener('scroll',(function(line_top,line_lft){
		return function(e){
			line_top.style.marginTop = this.scrollTop+'px';
			line_lft.style.marginLeft = this.scrollLeft+'px';
		}})(
		wrapper.querySelector('.fixed-top'),
		wrapper.querySelector('.fixed-lft')
		));
};
(function(onload){
if(["complete","loaded","interactive"].indexOf(document.readyState)>=0) onload();
else document.addEventListener('DOMContentLoaded',onload);
})(fixGridHeaders);
