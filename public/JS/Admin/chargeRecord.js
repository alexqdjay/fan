/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-19
 * Time: 下午8:00
 * To change this template use File | Settings | File Templates.
 */
var table;
var p281;
$(function(){
    // title
    setContentHeader('Charge Record');

    // collapse
    FA.collapse.select('chargeRecord');
    $('#chargeRecord').parent().parent().collapse('show');

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

    // table
    table = new Fan.table.Table({
        id:'recordTable',
        url:URL+'/../Charge/pageCharges',
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
                if(v == 2) {
                    return "<span style='color: #1C8C1D'>✔</span>";
                }
                else if(v==0){
                    return "<span style='color: #853333'>✘</span>";
                }
                else {
                    return "<span style='color: #22aaee'>O</span>";
                }
            }
        }]
    });

    table.store.load({
        params:{
            start:0,
            limit:20
        }
    });

    p281 = new Fan.table.PageTool({
        url:URL+'/../Charge/allChargesCount',
        id:'page1',
        limit:20,
        store:table.store
    });

    $('#searchText').val('')
});

function onSearch() {
    var query = $('#searchText').val();
    query = query==""?null:query;
    table.store.baseParams = {
        query:query
    };
    p281.reload({
        query:query
    });

    table.store.load({
        params:{
            start:0,
            limit:20
        }
    });
}