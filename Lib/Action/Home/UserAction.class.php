<?php

class UserAction extends Action{
	
	public function toRegister() {
		$this->title = '75Fan - Register';
		$this->display();
	}
	
	public function register() {
		$pwd= $_POST['pwd'];
		$name= $_POST['name'];
		
		$pwd = md5($pwd);
		
		$User = M('User');
		$re = $User->add(array('name'=>$name,'pwd'=>$pwd));
		
		if(!$re) {
			$this->redirect('User/toRegister');
		}
		else {
			$B = M('account');
			$B->add(array('user_id'=>$re));
			$this->redirect('User/registerSuccess');
		}
	}
	
	public function registerSuccess() {
		$this->display();
	}
	
	public function checkName() {
		$name = $_GET['name'];
		$c = array('name'=>$name);
		$User = M('User');
		$data = $User->where($c)->select();
		if($data == null) {
			$this->ajaxReturn(true);
		}
		else {
			$this->ajaxReturn(false);
		}
	}
}
?>