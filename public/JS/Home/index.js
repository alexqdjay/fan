/**
*
* 2013-01-22
*
* Index
*
**/

var animateArray = ['bounceInLeft','bounceInRight','bounceInDown','bounceInUp','rotateInUpRight'];
var i = 0;

function loginShow() {
	window.location.href = URL+"/../../index.php/Index/toLogin/p/Index-index";
	//$('#loginWin').modal('show');
}

$(function(){
	$('#loginWin').modal({
		show:false
	});
	
	$('.carousel').carousel({
		interval: 5000
	});
	
	$('.carousel').bind('slide',function(e) {
		$('.carousel .active').find('h3').hide();
	});
	
	$('.carousel').bind('slid',function(e) {
		$(this).find('.active .caption h3').each(function() {
            $(this).show();
			$(this).attr({'class':"animated "+animateArray[getNext()]});
		})
	});
});

function getNext() {
	i++;
	if(i>=5) {
		i=0;
	}
	
	return i;
}