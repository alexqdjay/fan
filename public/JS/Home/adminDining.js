/**
*
* 2013-01-18
*
* AdminDining
*
**/

var pagination1;
var pagination2;
var currentPage;
var currentSearch="";
var URL;
var events = [];
var currentDate;
var currentEventId;

$(function(){
	var url = window.location.href;
	URL = url;
	var reg = /page\/(\d*)\/s\/(\S*)/;
	var r = url.match(reg);
	var page = 1;
	if(r && r.length>1) {
		page = Number(r[1]);
		if(parseInt(page) != page) {
			page = 1;
		}
		currentSearch = r[2];
	}
	currentPage = page;
	
	pagination1 = new Fan.Pagination('#pagination1');
	pagination1.select(page);
	
	pagination2 = new Fan.Pagination('#pagination2');
	pagination2.select(page);
	
	$('#searchText').get(0).value = decodeURIComponent(currentSearch);
	$( "#datepicker" ).datepicker();
	
	$('#cal').fullCalendar({
		header:{
			right:  '',
		    center: 'title',
		    left:  'today prev,next'
		},
		weekMode:'variable',
		dayClick: function(a) {
			currentDate = a;
	       $('#modal1').modal('toggle');
	    },
	    events:{
	    	url:'/75fan/index.php/AdminDining/loadDiningData',
	    	success:function(arr) {
	    		events = arr;
	    	}
	    },
	    selectable:true,
	    selectHelper:true,
	    editable: true,
		droppable: true,
	    drop: function(date, allDay) {
			
			var originalEventObject = $(this).data('eventObject');
			
			var copiedEventObject = $.extend({}, originalEventObject);
			
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			
			addEvent(date,copiedEventObject.gid,copiedEventObject);
		},
		eventClick:function(calEvent, jsEvent, view) {
			currentEventId = (calEvent.id);
			$('#modal2').modal('toggle');
		},
		eventDrop:function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view ) { 
			$.ajax({
				url:'/75fan/index.php/AdminDining/updateDining',
				data:{
					id:event.id,
					time:event.start.getTime()
				}
			});
		}
    });
	
	$('.diningItem').each(function() {
		var name = $(this).text();
		var id = this.id;
		
		var eventObject = {
			title: $.trim(name),
			gid:id
		};
		
		$(this).data('eventObject', eventObject);
		
		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
	});
	
	$('.dining-tr').bind('dblclick',function(e){
		var id = $(this).find('.diningItem').attr('id');
		$.ajax({
			url:'/75fan/index.php/AdminDining/loadGoods',
			data:{
				id:id
			},
			success:function(o) {
				$('[name="name"]').val(o.name);
				$('[name="price"]').val(o.price);
				$('[name="taste"]').val(o.taste);
				$('[name="kind"]').val(o.kind);
				$('[name="category"]').val(o.category);
				$('[name="id"]').val(o.id);
			}
		});
	});
});

function newGoods() {
	$('[name="id"]').val(null);
	formSubmit();
}

function addEvent(date,gid,de) {
	for(var i=0;i<events.length;i++) {
		var event = events[i];
		if(event.goods_id == gid && date.getTime() == event.time*1000) {
			alert("重复!");
			return;
		}
	}
	
	events.push({
		goods_id:gid,
		time:date.getTime()/1000
	});
	
	$.ajax({
		url:'/75fan/index.php/AdminDining/addDining',
		data:{
			gid:gid,
			ts:date.getTime()
		},
		success:function(obj) {
			if(obj.success != -1) {
				de.id = obj.success;
				$('#cal').fullCalendar('renderEvent', de, true);
			}
		}
	});
}

function onClose() {
	$('#modal1').modal('hide');
}

function onComfireDelete() {
	if(currentEventId != null) {
		$.ajax({
			url:'/75fan/index.php/AdminDining/deleteDining',
			data:{
				id:currentEventId
			},
			success:function(s) {
				if(s != false) {
					$('#cal').fullCalendar('removeEvents',currentEventId);
				}
				$('#modal2').modal('toggle');
			}
		});
	}
}

function onComfireSelect() {
	var gid = $('#inputDining').val();
	var title = $('#inputDining').children("option[value='"+gid+"']").text();
	var event = {
			start:currentDate,
			allDay:true,
			title:title
	};
	addEvent(currentDate,gid,event);
	$('#modal1').modal('hide');
}

function onDeleteItem(id) {
	$.ajax('/75fan/index.php/AdminDining/delete',{
		data:{
			id:id
		},
		success:function(r) {
			var el = $('#data_'+id);
			el.hide(1000,function(){
				el.remove();
			})
		}
	});
}

function formSubmit() {
	$('#addForm').submit();
}

function search() {
	var v = $('#searchText').get(0).value;
	currentSearch = v;
	var i = URL.indexOf('AdminDining');
	var url = URL.substring(0,i) + "AdminDining/index/page/"+currentPage+"/s/"+currentSearch;
	window.location.href = url;
}

function onClickPre() {
	if(currentPage>1) {
		chagePageTo(currentPage-1);
	}
}

function onClickNext() {
	chagePageTo(currentPage+1);
}

function chagePageTo(page) {
	var i = URL.indexOf('AdminDining');
	var url = URL.substring(0,i) + "AdminDining/index/page/"+(page)+"/s/"+currentSearch;
	window.location.href = url;
}


