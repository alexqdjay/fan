/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-29
 * Time: 下午10:23
 * To change this template use File | Settings | File Templates.
 */
var goodsTable;
var p28;
var currentStore;
$(function(){
    // title
    setContentHeader('Goods');

    // collapse
    FA.collapse.select('goods');
    $('#goods').parent().parent().collapse('show');

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
            text:'Goods'
        }]
    };
    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    //table
    goodsTable = new Fan.table.Table({
        id:'goodsTable',
        url:URL+'/../Goods/listGoods',
        columns:[{
            dataIndex:'id'
        },{
            dataIndex:'photo'
        },{
            dataIndex:'name'
        },{
            dataIndex:'price'
        },{
            dataIndex:'last_ts',
            render:function(v){
                var date = new Date();
                date.setTime(v*1000);
                return Fan.util.DateFormat(date,'yyyy/MM/dd HH:mm:SS');
            }
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
        },{
            dataIndex:'status',
            render:function(v,item){
                return '<button class="btn btn-primary" onclick="onEdit('+item.id+')" style="margin-right:10px">Edit</button>' +
                    '<button class="btn btn-danger" onclick="onConfirm('+item.id+',0)">Close</button>';
            }
        }]
    });
    goodsTable.store.load();

    p28 = new Fan.table.PageTool({
        url:URL+'/../Goods/allCount',
        id:'page1',
        limit:20,
        store: goodsTable.store
    });

    $('#storeTypeahead').bind('keyup',function(e){
        if(e.keyCode == 13) {
            var query = $(this).val();
            $.ajax({
                url:URL+'/../Store/search',
                data:{
                    name:query
                },
                success:function(data){
                    if(data != null) {
                        currentStore = data;
                        $('#storeTypeahead').val(data.name);
                    }
                    else {
                        currentStore = null;
                        $('#storeTypeahead').val('');
                    }
                }
            });
        }
    });

    $('#storeSearchModal').on('show', function () {
        $('#storeTypeahead').val('');
    })

    $('#goodsSearch').val('');
});

function onSearch() {
    var query = $('#goodsSearch').val();
    query = query==""?null:query;
    goodsTable.store.baseParams = {
        query:query
    };
    p28.reload({
        query:query
    });

    goodsTable.store.load({
        params:{
            start:0,
            limit:20
        }
    });
}

function onStoreSelect() {
    if(!currentStore) return;

    goodsTable.store.url = URL+'/../Goods/listGoods?storeId='+currentStore.id;
    p28.url = URL+'/../Goods/allCount?storeId='+currentStore.id;
    p28.reload();
    goodsTable.store.load({
        params:{
            start:0,
            limit:20
        }
    });

    $('#storeInfo').find('h4>a').text(currentStore.name);
    var p = $('#storeInfo').find('address>p');
    $(p.get(0)).text(currentStore.addr);
    $(p.get(1)).text(currentStore.tel);
    $('#storeInfo').find('span').text(currentStore.summary);

    $('#storeSearchModal').modal('toggle')
}

function onCreate() {
    if(!currentStore) return;

    window.open(URL+'/../Goods/good?storeId='+currentStore.id);
}

function onEdit(id){
    window.open(URL+'/../Goods/good?id='+id);
}
