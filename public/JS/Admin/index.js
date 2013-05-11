$(function(){

   FA.collapse.select($('#home'));

    var c = {
        items:[{
            text:'Dashboard',
            href:'home',
            icon:'icon-home'
        }]
    };

    var bc = new Fan.Breadcrumb($('#breadcrumb .breadcrumb'));
    bc.creatItems(c);

    setContentHeader('Dashboard');
});


