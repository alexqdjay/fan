/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-5-13
 * Time: 下午1:33
 * To change this template use File | Settings | File Templates.
 */
var table;
$(function(){
    // title
    setContentHeader('Account List');

    // collapse
    FA.collapse.select('accountList');
    $('#accountList').parent().parent().collapse('show');

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
            text:'Account List'
        }]
    };
    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    // table
    table = new Fan.table.Table({
        id:'accountTable',
        url:URL+'/../Account/pageList',
        columns:[{
            dataIndex:'id'
        },{
            dataIndex:'name'
        },{
            dataIndex:'balance',
            render:function(v,item){
                v = new Number(v);
                v = v.toFixed(1);
                if(v<0) {
                    return '<p class="text-error">'+v+'</p>'
                }
                else {
                    return v;
                }
            }
        }]
    });

    table.store.load();
});