/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-5-13
 * Time: 下午3:29
 * To change this template use File | Settings | File Templates.
 */

var table;
var p28;
var currentPage;
var currentSearch="";
var URL;
var events = [];
var currentDate;
var currentEventId;
$(function(){

    getPath();

    // title
    setContentHeader('Dining');

    // collapse
    FA.collapse.select('dining');
    $('#dining').parent().parent().collapse('show');

    //breadcrumb
    var c = {
        items:[{
            text:'Dashboard',
            href:URL+'/../',
            icon:'icon-home'
        },{
            text:'Goods Manage',
            href:null,
            icon:'icon-user'
        },{
            text:'Dining'
        }]
    };
    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    // table
    table = new Fan.table.Table({
        id:'table',
        url:URL+'/../Goods/listGoods',
        columns:[{
            dataIndex:'id'
        },{
            dataIndex:'name',
            render:function(v,item){
                return '<div class="dining-item" name="'+v+'" data-id="'+item['id']+'">'+v+'</div>';
            }
        },{
            dataIndex:'price'
        },{
            dataIndex:'status',
            render:function(v,item){
                if(v == 0) {
                    return '<span class="label">disabled</span>';
                }
                else {
                    return '<span class="label label-success">active</span>';
                }
            }
        }]
    });
    table.store.load({
        params:{
            start:0,
            limit:10,
            query:currentSearch
        }
    });

    $(table).bind('afterrender',function(){
        $('.dining-item').each(function() {
            var name = $(this).text();
            var id = $(this).attr('data-id');
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
    });

    p28 = new Fan.table.PageTool({
        url:URL+'/../Goods/allCount',
        id:'page1',
        limit:10,
        autoLoad:false,
        store: table.store
    });

    p28.reload({
        query:currentSearch
    });

    // calendar
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
            url:URL+'/../Goods/loadDiningData',
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
                url:URL+'/../Goods/updateDining',
                data:{
                    id:event.id,
                    time:event.start.getTime()
                }
            });
        }
    });

    $('#search').val(currentSearch);
});

var reg = new RegExp("dining/query?(?:/(\\S*))?");
function getPath() {
    var query= null;
    var m = window.location.href.match(reg);
    if(m && m.length>1) {
        p = m[1];
        currentSearch = decodeURIComponent(p);
    }
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
        url:URL+'/../Goods/addDining',
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
            url:URL+'/../Goods/deleteDining',
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
    $.ajax(URL+'/../Goods/delete',{
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

function onSearch() {
    var v = $('#search').val();
    window.location.href = URL+'/../Goods/dining/query/'+v;
//    history.replaceState(null,'',URL+'/../Goods/dining/query/'+v);
//    currentSearch = v;
//    table.store.baseParams = {
//        query:v
//    };
//    p28.reload({
//        query:v
//    });
//    table.store.load({
//        params:{
//            start:0,
//            limit:10
//        }
//    });
}


