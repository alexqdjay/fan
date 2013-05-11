/**
 * alex
 * 2013/1/23
 * 
 */

function login() {
	$('form').submit();
}

$(function(){
    var user = getCookie('uu');
    if(user) {
        $('#inputName').val(user);
    }

    $(this).bind('keypress',function(e){
        if(e.keyCode  == 13) {
           $('#login').css('background-color','#0044cc');
            login();
        }
    });

});

function getCookie(c_name)
{
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1)
        {
            c_start=c_start + c_name.length+1
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
            return unescape(document.cookie.substring(c_start,c_end))
        }
    }
    return ""
}