/**
 * Created with JetBrains PhpStorm.
 * User: alex
 * Date: 13-4-6
 * Time: 下午10:44
 * To change this template use File | Settings | File Templates.
 */

$(function(){
    // title
    setContentHeader('Good');

    $('#inputLastDate').datepicker({
        dateFormat:'yy-mm-dd'
    });
});
