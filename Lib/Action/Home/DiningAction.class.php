<?php

class DiningAction extends Action{

    public function index($p='meal') {
    	$Login = A('Home/Login');

		if($Login && !$Login->checkLogin()) {
			$this->redirect('Index/toLogin',array('p'=>'Dining-index'));
			return;
		}
    	
    	$today = new DateTime();
    	$today->setTime(0,0,0);
    	$condition['time'] = array('in',strtotime($today->format('Y-m-d')).",0");
    	
    	$page = $_GET['page'];
		if(!$page) {
			$page = 0;
		}
    	
    	$this->title ='75Fan - Dining';
    	$this->userName = $_SESSION['name'];
    	
    	$Dining = M('Dining');
    	$this->data = $Dining->where($condition)->order('time desc')->page($page,20)->select();
    	$this->count = $Dining->where($condition)->count()/20;
    	
    	$html = $this->fetch("Dining:$p");
    	$this->innerHtml = $html;
    	
    	$this->display();
    }
    
    public function book() {
    	$html = $this->fetch("Dining:book");
    	$this->innerHtml = $html;
    	$this->display();
    }
    
    public function loadData() {
    	$today = new DateTime();
    	$today->setTime(0,0,0);
    	$condition['time'] = array('in',"$today->getTimestamp(),0");
    	
    	$page = $_GET['page'];
		if(!$page) {
			$page = 0;
		}
		
		$Dining = M('Dining');
    	$res['data'] = $Dining->where($condition)->order('time desc')->page($page,20)->select();
    	
    	$this->ajaxReturn($res,'json');
    }

	public function loadPersonalData($start=0,$end=0) {
		$uid = $_SESSION['uid'];
		$O = new OrdersModel();
		$o = $O->relation(true)->where(array('user_id'=>$uid,'status'=>array('NEQ',0),'ts'=>array(array('EGT',$start),array('LT',$end),'and')))->select();
		
		$D = M('Dining');
		$datas = $D->where(array('time'=>array(array('EGT',$start),array('LT',$end),'and')))->select();
		foreach($datas as &$data) {
			$b = 0;
			foreach($o as &$order) {
				if($order['dining_id'] == $data['id']) {
					$b = $order['status'];
					break;
				}
			}
			if($b == 1) {
				$data['className'] = 'dining-selected';
				$data['oid'] = $order['id'];
			}
			else if($b == 2) {
				$data['className'] = 'dining-completed';
			}
			$data['start'] = $data['time'];
    		$data['title'] = $data['name'];
    		$data['status'] = $b;
		}
    	$this->ajaxReturn($datas,'json');
	}
	   
    
    public function buy() {
    	$Login = A('Home/Login');
		
		if(!$Login->checkLogin()) {
			$this->ajaxReturn(array('success'=>-1,'msg'=>'no logined info!'),'json');
			return;
		}
		else {
			$id = $_GET['did'];
			$uid = $_SESSION['uid'];
			if(isset($id) && isset($uid)) {
				$Dining = M('Dining');
				$dining = $Dining->where(array('id'=>$id))->select();
				if(isset($dining)) {
					$data = array('dining_id'=>$id,'user_id'=>$uid,'ts'=>time(),'status'=>'1','desc'=>'new');
					$Orders = M('Orders');
					$res = $Orders->add($data);
					if($res == false) {
						$this->ajaxReturn(array('success'=>3,'msg'=>'save failed!'),'json');
						return;
					}
					else {
						$this->ajaxReturn(array('success'=>0),'json');
						return;
					}
					
				}
				$this->ajaxReturn(array('success'=>1,'msg'=>'not exist the dining!'),'json');
				return;
			}
			$this->ajaxReturn(array('success'=>2,'msg'=>'no id and user data!'),'json');
			return;
		}
    }
    
}
?>