<?php

class AdminAccountAction extends Action{
	
	public function chargeList() {
		$this->title="75Fan - charge";
		$this->userName = $_SESSION['name'];
		$Charges = new ChargesModel();
		$data = $Charges->relation(true)->where(array('status'=>0))->select();
		$this->data = $data;
		$this->display();
	}
	
	public function chargeComfire() {
		if($this->chechUser() != true) {
			$this->redirect('Index/index',array('p'=>'Index-index'));
		}
		$id = $_GET['id'];
		$C = M('Charges');
		$data = $C->where(array('id'=>$id,'status'=>0))->select();
		$data[0]['status'] = 1;
		$uid = $data[0]['user_id'];
		$C2 = M('account');
		$data2 = $C2->where(array('user_id'=>$uid))->select();
		
		if($data2 != null) {
			$data2[0]['balance'] += $data[0]['money'];
			$s = $C2->save($data2[0]);
		}
		if($s) {
			$C->save($data[0]);
		}
		$this->redirect('AdminAccount/chargeList');
	}
	
	public function chargeRefuse() {
		if($this->chechUser() != true) {
			$this->redirect('Index/index',array('p'=>'Index-index'));
		}
		$id = $_GET['id'];
		$C = M('Charges');
		$data = $C->where(array('id'=>$id))->select();
		$data[0]['status'] = 2;
		$C->save($data[0]);
		$this->redirect('AdminAccount/chargeList');
	}
	
	private function chechUser() {
		$A = A('Login');
		if(!$A->checkLogin()) {
			$this->redirect('Index/toLogin',array('p'=>'AdminAccount-chargeList'));
			return false;
		}
		$uid = $_SESSION['uid'];
		if($uid == 1) {
			return true;
		}
		return false;
	}
}
?>