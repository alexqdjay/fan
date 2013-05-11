var container;
$(function(){

//    var rl = Fan.silder.SilderList({
//        renderTo:'#s_1'
//    });

    container = $('#content');

    listStore();
});

function listStore() {
    container.empty();
    $.ajax({
        url:URL+'../../../Takeout/listStore',
        success:function(data) {
            for(var i=0;i<data.length;i++) {
                createStoreItem(data[i]);
            }
        }
    });
}

function createStoreItem(s) {
    var row = $('<div class="row item-row"></div>');
    var contentItem = $('<div class="content-item span12"></div>');
    container.append(row);
    row.append(contentItem);
    var storeInfo = $('<div class="item-info">'+
        '<span class="item-name">'+
        "<a><strong>"+ s.name+"</strong></a>"+
        '</span>'+
        '<span class="muted">'+
        '<small>月销量：2000</small>'+
        '</span>'+
        '</div>')
    contentItem.append(storeInfo);
    var itemList = $('<div class="item-list" id="s_'+ s.id+'"></div>')
    contentItem.append(itemList);
    itemList.append('<a class="list-silder-btn pull-left">&lt;</a>');
    var silderContainer = $('<div class="list-silder-container"><ul class="list-silder"></ul></div>');
    itemList.append(silderContainer);
    itemList.append('<a class="list-silder-btn pull-right list-silder-btn-disabled">&gt;</a>');
    var ul = silderContainer.find('ul');
    $.ajax({
        url:URL+"../../Takeout/listStoreGoodsTop10",
        data:{
            id: s.id
        },
        success:function(gs) {
            for(var i=0;i<gs.length;i++) {
                createGoodItems(ul,gs[i]);
            }
            Fan.silder.SilderList({
                renderTo:'#s_'+ s.id
            });
        }
    });
}

function createGoodItems(ul,g) {
    var goodItem = $('<li>'+
        '<p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/1.jpg"></a></p>'+
            '<p class="list-silder-item-info">'+
                '<span class="list-silder-item-info-price">￥'+g.price+'</span>'+
                '<span class="list-silder-item-info-num">月销量:'+ g.sales+'</span>' +
            '</p>'+
        '<p><a class="list-silder-item-info-desc">'+ g.name+'</a></p>'+
    '</li>');
    ul.append(goodItem);
}