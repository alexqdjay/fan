<?php

class OrdersAction extends Action{
	
	protected $auth = false;
	
	public function _initialize() {
		$Login = A('Home/Login');
		$this->auth = $Login->checkLogin();
	}
	
	public function confirm($id = 0) {
		$Orders = new OrdersModel();
		$orders = $Orders->relation(true)->where(array('id'=>$id,'status'=>1))->select();
		
		if($orders != null && count($orders)>0) {
			$r = $Orders->where(array('id'=>$id))->save(array('status'=>2));
			if($r) {
				$Account = M('account');
				$data = $Account->where(array('user_id'=>$orders[0]['user_id']))->select();
				if($data != null && count($data)>0) {
					$data[0]['balance'] -= $orders[0]['price'];
					$Account->save($data[0]);
				}
			}
			$this->ajaxReturn(array('success'=>0),'json');
		}
		else {
			$this->ajaxReturn(array('success'=>1),'json');
		}
	}
	
	public function close($id = 0) {
		$Orders = M('orders');
		$orders = $Orders->where(array('id'=>$id,'status'=>1))->select();
		if($orders != null && count($orders)>0) {
			$orders[0]['status'] = 0;
			$Orders->save($orders[0]);
			$this->ajaxReturn(array('success'=>0),'json');
		}
		else {
			$this->ajaxReturn(array('success'=>1),'json');
		}
	}
}
?>