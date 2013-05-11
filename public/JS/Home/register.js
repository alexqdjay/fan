/**
 * 
 * alex 2013/1/22
 * 
 * 
 * */

var FieldError = [{
	name:'success',
	code:0
},{
	name:'over length!', //1
	code:1
},{
	name:'field required!',//2
	code:2
},{
	name:'other',
	code:100
}];

$(function(){
	$('#inputName').popover({
		content:'Sorry,used!',
		trigger:'manual'
	});
});

function onNameFouce(){
	$('#inputName').popover('hide');
}

function toSubmit() {
	var b = true;
	b = b && checkField('inputName',/^[\w_]+[\w\d\._]*$/,true,2,12);
	var name = $('#inputName').val();
	$.ajax({
		url:'/75fan/index.php/User/checkName',
		data:{
			name:name
		},
		success:function(obj) {
			if(obj.toString()!="true") {
				$('#inputName').parent().parent().addClass('error');
				b = b && false;
				$('#inputName').popover('show');
			} 
			else {
				b = b && true;
				$('#inputName').popover('hide');
			}
			if(b) {
				b = b && checkField('inputPwd',/^[\w\d]*$/,true,6,12);
			}
			if(b) {
				b = b && checkField('inputPwdack',new RegExp('^'+$('#inputPwd').val()+'$'),true,6,12);
			}
			if(b) {
				$('form').submit();
			}
		}
	});
}

function onNameInput(){
	
	var name = $('#inputName').val();
	
	$('#inputEmail').val(name);
}

function checkVaild(val,reg,required,max,min) {
	var len = val.length;
	if(required && (val == null || len == 0)) {
		return FieldError[2];
	}
	
	if(!required && len== 0) return FieldError[0];
	
	if(len>0 && (len>max || len<min)) return FieldError[1];
	
	if(reg != null && val != null) {
		var m = reg.test(val);
		if(!m) {
			return FieldError[3];
		}
		else {
			return FieldError[0];
		}
	}
}

function checkField(id,reg,required,min,max) {
	var el = $('#'+id);
	var name = el.val();
	name = $.trim(name);
	var b = checkVaild(name,reg,required,max,min);
	
	if(b.code != 0) {
		el.parent().parent().addClass('error');
		return false;
	}
	else {
		el.parent().parent().removeClass('error');
		return true;
	}
}
