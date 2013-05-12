/**
 * alex
 * 
 * 2013/1/24
 * 
 */

var reg = new RegExp("index/(\\w*)(?:/(\\d))?");
var leftNavList = null;
var tabContent = null;
var orders = {
		page:1,
		total:0
};
$(function(){
	leftNavList = $('ul.nav-list li');
	tabContent = $('#tab-content');
	
	init();

	leftNavList.bind('click',function(e){
		var target = e.currentTarget;
		var id = target.id;
		var clas = $(target).attr('class');
		if("active" == clas) {
			return;
		}
		else {
			history.pushState(null,null);
			history.replaceState(null,'',URL+'/../../Personal/index/'+id);
			selectNav(id);
			getTabContent(id);
			orders.page = 1;
		}
	});
	
	window.onpopstate = function(e) {
		init();
	}
	
});

function selectNav(id) {
	if(leftNavList == null) return;
	leftNavList.removeClass('active');
	$('#'+id).addClass('active');
}

function init() {
	var m = window.location.href.match(reg);
	var p = 'home';
	var type = 0;
	if(m && m.length>1) {
		p = m[1];
		if(m.length>2) {
			type = m[2];
		}
	}
	if(type == null)type=0;
	selectNav(p);
	getTabContent(p,type);
}

function getTabContent(id,type) {
	if(type == null)type=0;
	$.ajax({
		url:URL+'/../../Personal/'+id+'/type/'+type,
		dataType:'json',
		success:function(res){
			if(res== null)return;
			tabContent.html(res.html);
			if(id == 'orders') {
                if(type<=0)type=1;
				selectPagination(type);
				orders.total = res.count;
                orders.page = parseInt(type);
			}
			$('.btn').removeClass('active');
			$('#r'+type).addClass('active');
		}
	});
}

function onClickPre() {
	if(orders.page>1) {
		onClickPagination(orders.page-1);
	}
}

function onClickCharge() {
	$('#modal1').modal('toggle');
}

var currentOrderId;
function onCloseItem(id) {
	currentOrderId = id;
	$('#modal').modal('toggle');
}

function onComfire() {
	if(currentOrderId) {
		$.ajax({
			url:'/75fan/index.php/Orders/close',
			data:{id:currentOrderId},
			success:function(s) {
				if(s.success == 0) {
					$('#order_'+currentOrderId).find('.order-status').text('closed');
				}
				$('#modal').modal('toggle');
			}
		});
	}
}

function onComfireCharge() {
	$.ajax({
		url:URL+'/../../Account/charge',
		data:{
			v:$('#chargeValue').val()
		},
		success:function(obj) {
			if(obj.success>0) {
				$('#modal1').modal('toggle');
			}
		}
	});
}

function onClickNext() {
	if(orders.page<orders.total) {
		onClickPagination(orders.page+1);
	}
}

function onClickPagination(i) {
	if(orders.page != i) {
		orders.page = i;
        history.replaceState(null,'',URL+'/../../Personal/index/orders/'+i);
		$.ajax({
			url:URL+'/../../Personal/ordersPage?page='+i,
			dataType:'json',
			success:function(res){
				tabContent.html(res.html);
				selectPagination(i);
				orders.total = res.count;
			}
		});
	}
}

function loadRecord(type) {
	history.pushState(null,null);
	history.replaceState(null,'',URL+'/../../Personal/index/balance/'+type);
	$.ajax({
		url:URL+'/../../Personal/balance',
		data:{
			type:type
		},
		success:function(obj) {
			tabContent.html(obj.html);
			$('.btn').removeClass('active');
			$('#r'+type).addClass('active');
		}
	});
}

function selectPagination(i) {
	$('.pagination-count').removeClass('active');
	$('#paginationCount_'+i).parent().addClass('active');
}

