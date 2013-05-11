/**
*
* 2013-01-20
*
* Dining
*
**/
var pageTime;
var pageTime2;
var pageDate;
var pageDay;
var pagination1;
var pagination2;
var table;
var currentPage=1;
var currentDiningId = -1;
var currentXTs = 10;
var currentTab="dining";
var silderBar;

$(function(){
	silderBar = $(".fan-left-nav li");
	
	//Parse URL
	parseUrl();
	
	//Page
	pagination1 = new Fan.Pagination('#pagination1');
	pagination1.select(currentPage);

	pagination2 = new Fan.Pagination('#pagination2');
	pagination2.select(currentPage);
	
	// Get Date
	pageTime = $('.timeblock h3');
	pageTime2 = $('.timeblock2 h3');
	pageDate = $('.timeblock h6 em');
	pageDay = $('.weekblock span');
	
	//getTime();
	
	//init table
	table = new Fan.Table('#diningTable',
			[{
				name:'name'
			},{
				name:'price'
			},{
				name:'id',
				render:function(str) {
					return '<button class="btn btn-primary" onclick="onClickBuy('+str+')">Buy</button>';
				}
			}]);
	if(currentPage != 1) {
		onClickPagination(currentPage);
	}
	
	//init calendar
	$('#cal').fullCalendar({
		header:{
			right:  '',
		    center: 'title',
		    left:  'today prev,next'
		},
		weekMode:'variable',
	    events:{
	    	url:URL+'/../../Dining/loadPersonalData'
	    },
	    eventClick:function(event,e,v) {
	    	if(event.status == 0) {
	    		buy(event.id);
	    	}
	    	else if(event.status == 1) {
	    		close(event.oid);
	    	}
	    },
	    selectable:false,
	    selectHelper:false,
	    editable: false,
		droppable: false
    });
	
	//init silderbar
	silderBar.bind('click',function(){
		var active = $(this).attr('class');
		var id = this.id;
		if(active != "active") {
			selectSilderBar($("#"+id));
		}
	});
	
	selectSilderBar($("#sbar_"+currentTab));
});

function parseUrl() {
	var url = window.location.href;
	var reg = /p\/(\S*)?/;
	r = url.match(reg);
	if(r && r.length>1) {
		currentTab = r[1];
	}
	else {
		currentTab = 'meal';
	}
}

function selectSilderBar(tab) {
	silderBar.removeClass("active");
	tab.addClass("active");
}

function onClickPagination(page) {
	currentPage = page;
	
	$.ajax({
		url:URL+'/../../Dining/loadData',
		data:{
			page:currentPage
		},
		success:function(data, textStatus, jqXHR) {
			pagination1.select(currentPage);
			pagination2.select(currentPage);
			table.reloadData(data.data);
		}
	});
}

function onComfireBuy() {
	$.ajax({
		url:URL+'/../../Dining/buy',
		data:{
			did:currentDiningId
		},
		success:function(obj){
			if(obj.success != 0) {
				if(obj.success == -1) {
					Fan.Login.toLogin();
				}
				alert(obj.msg);
			}
			else {
				$('#cal').fullCalendar('refetchEvents');
			}
			$('#modal1').modal('toggle');
		}
	});
}

function onComfireClose() {
	$.ajax({
		url:URL+'/../..//Orders/close',
		data:{
			id:currentDiningId
		},
		success:function(obj){
			if(obj.success == 0) {
				$('#cal').fullCalendar('refetchEvents');
			}
			$('#modal2').modal('toggle');
		}
	});
}

function onClose() {
	$('#modal1').modal('toggle');
}

function onClickBuy(id) {
	if(currentXTs > 0) {
		buy(id);
	}
}

function buy(id) {
	currentDiningId = id;
	$('#modal1').modal('toggle');
}

function close(id) {
	currentDiningId = id;
	$('#modal2').modal('toggle');
}

function getTime() {
	$.ajax({
		url:URL+'/../../Time/now',
		success:function(obj){
			var d = new Date();
			d.setTime(obj.time * 1000);
			var dateString = d.getFullYear()+"/"+(d.getMonth()+1)+"/"+d.getDate();
			var timeString = (d.getHours()<10?'0'+d.getHours():d.getHours())+":"
					+(d.getMinutes()<10?'0'+d.getMinutes():d.getMinutes());
			var dayString = Fan.Const.WeekDate[d.getDay()];
			pageTime.text(timeString);
			pageDate.text(dateString);
			pageDay.text(dayString);
			
			currentXTs = obj.xts * 1000;
			
			setInterval(refreshTime,100);
		}
	});
}

function refreshTime() {
	var h = 0;
	var m = 0;
	var s = 0;
	var ms = 0;
	var tmp = 0;
	if(currentXTs > 0) {
		currentXTs -= 100;
		h = Math.floor(currentXTs/(1000*60*60));
		tmp = currentXTs%(1000*60*60);
		m = Math.floor(tmp/(1000*60));
		tmp = tmp % (1000*60);
		s = Math.floor(tmp /(1000));
		tmp = tmp % (1000);
		ms = Math.floor(tmp / 100);
	}
	else {
		h = 0;
		m = 0;
		s = 0;
		ms = 0;
		$('.btn').addClass('disabled');
	}
	pageTime2.text((h>=10?h:'0'+h)+":"+(m>=10?m:'0'+m)+":"+(s>=10?s:'0'+s)+"."+ms);
}

function onClickPre() {
	if(currentPage>1) {
		onClickPagination(currentPage-1);
	}
}

function onClickNext() {
	onClickPagination(currentPage+1);
}

