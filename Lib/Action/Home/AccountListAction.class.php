<?php

class AccountListAction extends Action{

    
    public function index() {
    	$Account = M('account');
    	$data = $Account->select();
    	$this->data = $data;
    	$this->title = "75Fan - Account";
    	$this->display();
    }
    
}
?>