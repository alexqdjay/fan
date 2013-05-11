/**
 * alex
 * 2013/2/17
 * 
 */

$(function(){
	$.each($('td.money'),function(i,o){
		if(parseInt($(o).text())>0) {
			$(o).removeClass('red');
			$(o).addClass('green');
		}
		else {
			$(o).removeClass('green');
			$(o).addClass('red');
		}
	});
});

function onClickComf(id) {
	window.location.href = '../AdminAccount/chargeComfire/id/'+id;
}

function onClickRefuse(id) {
	window.location.href = '../AdminAccount/chargeRefuse/id/'+id;
}