/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-5-14
 * Time: 上午10:26
 * To change this template use File | Settings | File Templates.
 */

var table;
$(function(){
    // title
    setContentHeader('Orders');

    // collapse
    FA.collapse.select('orders');
    $('#orders').parent().parent().collapse('show');

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
            text:'Orders'
        }]
    };
    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    // table
    table = new Fan.table.Table({
        id:'table',
        url:URL+'/../Order/listOrders',
        columns:[{
            dataIndex:'id'
        },{
            dataIndex:'ts',
            render:function(v){
                var date = new Date();
                date.setTime(v*1000);
                return Fan.util.DateFormat(date,'yyyy/MM/dd HH:mm:SS');
            }
        },{
            dataIndex:'user'
        },{
            dataIndex:'name'
        },{
            dataIndex:'price'
        },{
            dataIndex:'status',
            render:function(v,item){
                return '<a class="btn btn-primary" onclick="confirm('+item['id']+') " style="margin-right:5px;">Confirm</a><a class="btn btn-danger" onclick="onCloseOrder('+item['id']+')">Close</a>';
            }
        }]
    });

    table.store.load({
        params:{
            start:0,
            limit:10
        }
    });

    $("input[id^='dateSearch']").val('');

    $("#dateSearchFrom").datepicker({
        dateFormat:'yy-mm-dd',
        onClose: function( selectedDate ) {
            $( "#dateSearchTo" ).datepicker( "option", "minDate", selectedDate );
        }
    });

    $("#dateSearchTo").datepicker({
        dateFormat:'yy-mm-dd',
        onClose: function( selectedDate ) {
            $( "#dateSearchFrom" ).datepicker( "option", "maxDate", selectedDate );
        }
    });


});

function onSearch() {
    var datef = $('#dateSearchFrom').datepicker('getDate');
    var datet = $('#dateSearchTo').datepicker('getDate');
    if(datef == null || datet==null) {
        $('input[id^="dateSearch"]').parent().addClass('error');
    }
    else {
        $('#dateSearch').parent().parent().removeClass('error');
        table.store.load({
            params:{
                from:datef.getTime()/1000,
                to:datef.getTime()/1000
            }
        });
    }


}

function confirm(oid) {
    $.ajax({
        url:URL+"/../../../Orders/confirm",
        data:{
            id:oid
        },
        success:function(obj){
            if(obj.success == 0) {
                table.store.load();
            }
            else {

            }
        }
    });
}

function onCloseOrder(oid) {
    $.ajax({
        url:URL+"/../../../Orders/close",
        data:{
            id:oid
        },
        success:function(obj){
            if(obj.success == 0) {
                table.store.load();
            }
            else {

            }
        }
    });
}