/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-4-7
 * Time: 下午8:58
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    // title
    setContentHeader('Store');

    $('#inputLastDate').datepicker({
        dateFormat:'yy-mm-dd'
    });
});