<?php


class AuthCheckBehavior extends Behavior{

    public function run(&$return){
    	$Login = A('Login');
    	$Login->checkLogin();
    }
    
}
?>