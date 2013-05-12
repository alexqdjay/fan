/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-17
 * Time: 下午12:25
 * To change this template use File | Settings | File Templates.
 */

var userTable;
var p281;
var p282;
$(function(){

    setContentHeader('Users List');

    var c = {
        items:[{
            text:'Dashboard',
            href:URL+'/../',
            icon:'icon-home'
        },{
            text:'User Manage',
            href:null,
            icon:'icon-user'
        },{
            text:'Users'
        }]
    };

    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    FA.collapse.select($('#users'));
    $('#users').parent().parent().collapse('show');

    userTable = new Fan.table.Table({
        id:'userTable',
        columns:[{
            dataIndex:'id',
            width:'15%'
        },{
            dataIndex:'name',
            width:'20%'
        },{
            dataIndex:'register_ts',
            render:timeRender
        },{
            dataIndex:'login_ts',
            render:timeRender2
        },{
            dataIndex:'status'
        }],
        url:URL+'/../User/listUsers'
    });

    userTable.store.load({
        params:{
            start:0,
            limit:20
        }
    });

    p281 = new Fan.table.PageTool({
        url:URL+'/../User/allCount',
        id:'page1',
        limit:20,
        store:userTable.store
    });

    p282 = new Fan.table.PageTool({
        url:URL+'/../User/allCount',
        id:'page2',
        limit:20,
        store:userTable.store
    });

    p281.setSibling(p282);

    $('#searchText').val('');

    $.ajax({
        url:URL+'/../User/allCount',
        success:function(obj){
            $('#registerStat strong').text(obj.total);
        }
    });
});

function onSearch() {
   var query = $('#searchText').val();
   query = query==""?null:query;
   userTable.store.baseParams = {
       query:query
   };
   p281.reload({
       query:query
   });
    p282.reload({
        query:query
    });
    userTable.store.load({
        params:{
            start:0,
            limit:20
        }
    });
}

function timeRender(value) {
    if(!$.isNumeric(value)){
        value = parseInt(value);
    }
    value *= 1000;
    var date = new Date();
    date.setTime(value);

    return Fan.util.DateFormat(date,'yyyy/MM/dd');
}

function timeRender2(value) {
    if(!$.isNumeric(value)){
        value = parseInt(value);
    }
    var date = new Date();
    date.setTime(value);

    return Fan.util.DateFormat(date,'yyyy/MM/dd HH:mm:SS');
}