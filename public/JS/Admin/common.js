/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-17
 * Time: 下午12:21
 * To change this template use File | Settings | File Templates.
 */

var FA = FA || {};

$(function(){
    FA.collapse = new Fan.Collapse();
    $(FA.collapse).bind('change',function(e,t){
        setContentHeader($(t).text());
    });
});

function setContentHeader(title) {
    $('#contentHeader h1').text(title);
}
