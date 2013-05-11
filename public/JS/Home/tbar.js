/**
 * 
 * alex
 * 
 * 2013/1/23
 * 
 * **/
var navLi;
$(function() {
	var reg = new RegExp('fan/index.php/(\\S*)/?');
	navLi = $('.fan-nav li');
	var nav = null;
	if(URL == null)  {
		nav = 'index';
	}
	else {
		var m = URL.match(reg);
		if(m != null && m.length>1) {
			nav = m[1].toLowerCase();
		}
		else {
			nav = 'index';
		}
	}
	selectTBarNav(nav);
});

function selectTBarNav(id) {
	navLi.removeClass('active');
	$('#'+id).addClass('active');
}

function logout() {
	$.ajax({
		url:URL+'/../../Login/logout',
		success:function() {
			window.location.href = URL+"/../../";
		}
	});
}