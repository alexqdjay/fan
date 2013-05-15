<?php


class AuthCheckBehavior extends Behavior{

    public function run(&$return){
    	$Login = A('Home/Login');
    	$Login->checkLogin();
    }
    
}
?>