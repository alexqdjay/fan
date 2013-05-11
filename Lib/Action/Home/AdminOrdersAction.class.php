<?php

class AdminOrdersAction extends Action{
	
	public function index() {
		$Login = A('Login');
		if(!$Login->checkLogin()) {
			$this->redirect('Index/toLogin',array('p'=>'AdminOrders-index'));
			return;
		}
		$name = $_SESSION['name'];
		$this->userName = $name;
		$this->title = "75Fan - AdminOrders";
		$today = new DateTime();
		$today->setTime(0,0,0);
		$nexDay = $today->getTimestamp()+24*3600;
		$Orders = new OrdersModel();
		$data = $Orders->relation(true)->where(array('ts'=>array(array('EGT',$today->getTimestamp()),array('LT',$nexDay),'and'),'status'=>1))->order('ts desc')->select();
		$this->data = $data;
		
		$data2 = $Orders->relation(true)->where(array('ts'=>array('EGT',$today->getTimestamp(),'and'),'status'=>2))->order('ts desc')->select();
		$this->data2 = $data2;
		
		$this->display();
	}
	
}
?>