var msgInput = null;
var sendBtn = null;
var msgDisplay = null;

$(function(){
    msgInput = $('#msgInput');
    sendBtn = $('#sendBtn');
    msgDisplay = $('#msg-display');

    sendBtn.on('click',function(){
        sendMsg();
    });

    msgInput.keypress(function(e){
        if(e.keyCode == 13) {
            sendMsg();
        }
    });


    //syn();
});

function syn() {
    $.ajax({
        url:URL+"/syn",
        data:{
            rtp:new Date().getTime()
        },
        success:function(obj) {
            for(var i=0;i<obj.length;i++) {
                var data = obj[i];
                var msg = generateOneMsg(data);
                msgDisplay.append(msg);
            }
            syn();
        }
    });
}

function generateOneMsg(data) {
    var d = new Date(data.ts*1000);
    var date = d.getHours()+":"+ d.getMinutes()+":"+ d.getSeconds();
    var htm =
        '<div class="msg-from msg">' +
            '<div class="portrait"></div>' +
            '<pre class="msg-content">'+data.msg+'</pre>' +
            '<div class="msg-time">'+date+'</div>'+
        '</div>';
    return $(htm);
}

function syn2() {
    $.ajax({
        url:URL+"/test",
        success:function(obj) {
            msgDisplay.append('<div>'+obj.ts+'</div>');
        }
    });
}

function sendMsg() {
    $.ajax({
        url:URL+"/send",
        data:{
            tid:49,
            msg:msgInput.val()
        },
        success:function(obj) {
            msgDisplay.append('<div>'+obj+'</div>');
        }
    });
}