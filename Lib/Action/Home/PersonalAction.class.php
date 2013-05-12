<?php

class PersonalAction extends Action{
	
	protected $auth = false;
	
	public function _initialize() {
		$Login = A('Home/Login');
		$this->auth = $Login->checkLogin();
	}
	
	public function home() {
		$html = $this->fetch();
		
		$this->ajaxReturn(array('count'=>$this->count,'html'=>$html),'json');
	}
	
	public function index() {
        if(!$this->auth) {
			$this->redirect('Index/toLogin',array('p'=>'Personal-index'));
			return;
		}
		else {
			$name = $_SESSION['name'];
			$this->title = "75Fan - $name";
			$this->userName = $name;
			$this->display();
		}
	}
	
	public function orders($type=1) {
		if(!$this->auth) {
			$this->redirect('Index/toLogin',array('p'=>'Personal-index'));
			return;
		}
		else {
            if($type<=0)$type=1;
			$name = $_SESSION['name'];
			$uid = $_SESSION['uid'];
			$data = array();
			$count = 0;
			$ar = array('count'=>0,'data'=>array());
			if(isset($name) && isset($uid)) {
				$ar = $this->getOrdersDataByPage($type,$uid);
			}
		}
		$this->count = $ar['count'];
		$this->data = $ar['data'];
		
		$html = $this->fetch();

		$this->ajaxReturn(array('count'=>$this->count,'html'=>$html),'json');
	}
	
	public function balance($type=0) {
		if(!$this->auth) {
			$this->redirect('Index/toLogin',array('p'=>'Personal-index'));
			return;
		}
		$Account = M('account');
		$uid = $_SESSION['uid'];
		$data = $Account->where(array('user_id'=>$uid))->select();
		if($data != null) {
			$this->balance = sprintf('%.1f',$data[0]['balance']);
		}
		else {
			$this->balance = 0.0;
		}
		$this->type=$type;
		$this->data = $this->getAccountRecords($type,$uid);
		$html = $this->fetch();
		$this->ajaxReturn(array('html'=>$html),'json');
	}
	
	public function calendar() {
		$html = $this->fetch();
		$this->ajaxReturn(array('html'=>$html),'json');
	}
	
	private function getAccountRecords($type,$uid) {
		$db =  new Model();
		if($type == 0) {
			$date = new DateTime(date('Y-m-01'));
			$ts = strtotime('now');
			$sqlsss = "select ts,-1*price as money from orders,dining  where status=2 and user_id=$uid and ts>$ts and dining_id=dining.id union select ts, money from charges where user_id=$uid and ts>$ts order by ts desc";
		}
		else if($type != 0) {
			$strDate=date('Y-m-01',strtotime('-1 month'));
			$date = new DateTime($strDate);
			$ts = strtotime('now');
			if($type == 1) {
				$sqlsss = "select ts,-1*price as money from orders,dining  where status=2 and user_id=$uid and ts>$ts and dining_id=dining.id union select ts, money from charges where user_id=$uid and ts>$ts order by ts desc";
			}
			else {
				$sqlsss = "select ts,-1*price as money from orders,dining  where status=2 and user_id=$uid and ts<$ts and dining_id=dining.id union select ts, money from charges where user_id=$uid and ts<$ts order by ts desc";
			}
		}
		$data = $db->query($sqlsss,true);
		return $data;
	}
	
	public function ordersPage() {
		$page = $_GET['page'];
		$uid = $_SESSION['uid'];
		$arr = $this->getOrdersDataByPage($page,$uid);
		
		$this->count = $arr['count'];
		$this->data = $arr['data'];
		
		$html = $this->fetch('Personal:orders');
		
		$this->ajaxReturn(array('count'=>$this->count,'html'=>$html),'json');
	}
	
	private function getOrdersDataByPage($page,$uid) {
		$Orders = new OrdersModel();
		$data = $Orders->relation(true)->where(array('user_id'=>$uid))->order('ts desc')->page($page,15)->select();
		$count = $Orders->where(array('user_id'=>$uid))->count()/15;
		return array('count'=>$count,'data'=>$data);
	}
	
}
?>