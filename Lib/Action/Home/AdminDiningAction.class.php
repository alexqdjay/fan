<?php

class AdminDiningAction extends Action{
	
	public function index() {
		$Dining = M('goods');
		$page = $_GET['page'];
		$query = $_GET['s'];
		$this->title = "75Fan - AdminDining";
		if(!$page) {
			$page = 0;
		}
		$condition['category'] = 'meal';
		if($query) {
			$condition['name'] = array('like','%'.$query.'%'); 
		}
		
		$this->count = $Dining->where($condition)->count()/10;
		
    	$data = $Dining->where($condition)->order('id desc')->page($page,10)->select();
    	$this->data = $data;
    	$this->display();
	}
	
	public function add() {
    	
    	$Table = D('goods');
    	
    	$b = $Table->create();
    	if($b) {
    		if($b['id']){
    			$Table->save($b);
    		}
    		else {
    			$Table->add();
    		}
    		
    	}
    	
    	$this->redirect('AdminDining/index');
    }
    
    public function delete() {
    	$id = $_GET['id'];
    	if(!$id) {
    		$id = 0;
    	}
    	
    	$Dining = M('goods');
    	$Dining->where(array('id'=>$id))->delete();
    	
    	echo '{success:0}';
    }
    
    public function addDining($gid=0,$ts=0) {
    	$date = new DateTime();
    	
    	$G = M('goods');
    	$g = $G->where(array('id'=>$gid))->select();
    	
    	$D = M('dining');
    	$data = array('name'=>$g[0]['name'],'price'=>$g[0]['price'],'time'=>$ts/1000,'goods_id'=>$gid);
    	$id = $D->add($data);
    	
    	if($id != false) {
    		$this->ajaxReturn(array('success'=>$id),'json');
    	} else {
    		$this->ajaxReturn(array('success'=>-1),'json');
    	}
    		
    }
    
    public function updateDining($id=0,$time=0) {
    	$D = M('dining');
    	$data = $D->where(array('id'=>$id))->select();
    	
    	if($data != null && count($data)>0) {
    		$data[0]['time'] = $time/1000;
    		$res = $D->save($data[0]);
    	}
    }
    
    public function deleteDining($id =0) {
    	$D = M('dining');
    	$data = $D->where(array('id'=>$id))->delete();
    	echo $data;
    }
    
    public function loadDiningData($start=0,$end=0) {
    	$D = M('dining');
    	$datas = $D->where(array('time'=>array(array('EGT',$start),array('LT',$end),'and')))->select();
    	foreach($datas as &$data) {
    		$data['start'] = $data['time'];
    		$data['title'] = $data['name'];
    	}
    	$this->ajaxReturn($datas,'json');
    }
    
    public function loadGoods($id=0) {
    	$G = M('goods');
    	$g = $G->where(array('id'=>$id))->select();
    	if($g != null) {
    		$this->ajaxReturn($g[0],'json');
    	}
    	else {
    		$this->ajaxReturn(array(),'json');
    	}
    }
    
    private function changeTime($i) {
    	switch($i) {
    		case 0:return 'All';
    		case 1:return 'Mon';
    		case 2:return 'Tus';
    		case 3:return 'Wed';
    		case 4:return 'Thu';
    		case 5:return 'Fri';
    		case 6:return 'Sat';
    		case 7:return 'Sun';
    	}
    	return 'All';
    }
}
?>