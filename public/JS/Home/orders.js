

function onComfire(id) {
	$.ajax({
		url:'/75fan/index.php/Orders/confirm',
		data:{id:id},
		success:function(obj) {
			if(obj.success == 0) {
				$('#order_'+id).remove();
				window.location.href = "/75fan/index.php/AdminOrders/index";
			}
			else {
				$('#order_'+id).remove();
			}
		}
	});
}

function onClose(id) {
	$.ajax({
		url:'/75fan/index.php/Orders/close',
		data:{id:id},
		success:function(obj) {
			if(obj.success == 0) {
				$('#order_'+id).remove();
			}
		}
	});
}