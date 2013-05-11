/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-4-7
 * Time: 下午8:29
 * To change this template use File | Settings | File Templates.
 */
var table;
var p28;
$(function(){
    // title
    setContentHeader('Stores');

    // collapse
    FA.collapse.select('stores');
    $('#stores').parent().parent().collapse('show');

    //breadcrumb
    var c = {
        items:[{
            text:'Dashboard',
            href:URL+'/../',
            icon:'icon-home'
        },{
            text:'Goods Manage',
            href:null,
            icon:'icon-briefcase'
        },{
            text:'Stores'
        }]
    };
    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    //table
    table = new Fan.table.Table({
        id:'table',
        url:URL+'/../Goods/listStores',
        columns:[{
            dataIndex:'id'
        },{
            dataIndex:'name',
            render:function(v,item){
                return '<a onclick="onClick('+item.id+')" href="#">'+v+'</a>';
            }
        },{
            dataIndex:'summary'
        },{
            dataIndex:'active',
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
    table.store.load();

    p28 = new Fan.table.PageTool({
        url:URL+'/../Goods/allStoreCount',
        id:'page1',
        limit:20,
        store: table.store
    });
});

function onSearch() {
    var query = $('#search').val();
    query = query==""?null:query;
    table.store.baseParams = {
        query:query
    };
    p28.reload({
        query:query
    });

    table.store.load({
        params:{
            start:0,
            limit:20
        }
    });
}

function onClick(id) {
    window.open(URL+'/../Goods/store?id='+id);
}

function onCreate() {
    window.open(URL+'/../Goods/store');
}