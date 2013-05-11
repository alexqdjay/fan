<?php

class AccountAction extends Action{

    public function charge() {
    	$uid = $_SESSION['uid'];
    	$C = new ChargesModel();
    	if($uid != null) {
			 $data['ts'] = time();
			 $data['user_id'] = $uid;
			 $data['money'] = (int)$_GET['v'];
			 $s = $C->add($data);	
    	}
    	$this->ajaxReturn(array('success'=>$s),'json');
    }
}
?>