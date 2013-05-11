var table;
$(function(){
    // title
    setContentHeader('Charge');

    // collapse
    FA.collapse.select('charge');
    $('#charge').parent().parent().collapse('show');

    //breadcrumb
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
            text:'Charge'
        }]
    };
    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    //table
   table = new Fan.table.Table({
        id:'chargesTable',
        url:URL+'/../Charge/listChargesNeedConfirm',
        columns:[{
            dataIndex:'id'
        },{
            dataIndex:'userName'
        },{
            dataIndex:'money'
        },{
            dataIndex:'ts',
            render:function(v){
                var date = new Date();
                date.setTime(v*1000);
                return Fan.util.DateFormat(date,'yyyy/MM/dd HH:mm:SS');
            }
        },{
            dataIndex:'status',
            render:function(v,item){
                return '<button class="btn btn-primary" onclick="onConfirm('+item.id+',2)" style="margin-right:10px">Confirm</button>' +
                    '<button class="btn btn-danger" onclick="onConfirm('+item.id+',0)">Close</button>';
            }
        }]
    });
    table.store.load();
});

function onConfirm(id,v) {
    $.ajax({
        url:URL+'/../Charge/confirm',
        data:{id:id,status:v},
        success:function(obj) {
            if(obj.success){
                table.store.load();
            }
        }
    });
}