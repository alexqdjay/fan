/**
 * Fan JS Compoment
 * 
 */

var Fan = Fan || {};
Fan.Const = Fan.Const || {};
Fan.Login = Fan.Login || {};

/**
 * 
 * Pagination
 * 
 * */

Fan.Pagination = function (id) {
	var _this = this;
	this.pagination = $(id);
	var arr = $(id+" li a");
	this.select = function(count) {
		arr.each(function(i){
			var a = arr.get(i);
			var text = a.text;
			var parent = $(a).parent();
			$(parent).removeClass('active');
			if(text == count) {
				$(parent).addClass('active');
			}
		});
	}
}

/**
 * 
 * Table
 * 
 * */

Fan.Table = function(id,fields) {
	var _thie = this;
	this.table = $(id);
	var tbody = $(id+" tbody");
	this.fields = fields;
	
	this.reloadData = function(data) {
		tbody.empty();
		if(data == null)return;
		for(var i=0;i<data.length;i++) {
			var item = data[i];
			var el = tbody.append("<tr id='data_"+i+"'></tr>");
			$.each(this.fields,function(i,f){
				var v = item[f.name];
				var html = '';
				if(f.render) {
					html = f.render(v);
				}
				else {
					html = v;
				}
				el.append("<td>"+html+"</td>");
			});
		}
	}
}

/**
 * 
 * Modal Window
 * 
 * */



/**
 *   Const WeekDate
 * 
 **/

Fan.Const.WeekDate = ['Sun','Mon','Tus','Wes','Thu','Fri','Sat'];

/**
 *   Login
 * 
 **/

Fan.Login.toLogin = function() {
	window.location.href = "/75fan/index.php/Index/toLogin/p/Dining-index"
}
