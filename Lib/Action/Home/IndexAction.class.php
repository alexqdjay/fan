<?php
class IndexAction extends Action {
    public function index(){
    	$this->title = '75Fan - Home';
    	$name = $_SESSION['name'];
    	$this->userName = $name;
    	$this->display();
    }
    
    public function hi() {
    	$Data = M('User');
    	$this->name = 'Jay';
    	$this->data = $Data->select();
    	$this->display();
    }
    
    public function helloWorld() {
    	echo 'hello world!';
    }
    
    public function login() {
    	$url = 'ldap://192.168.51.131:389';
    	$name = 'qianduo@corp.eccom.com.cn';
    	$pwd = '19871209Xy';
    	$conn = ldap_connect($url) or die( 'Could not connect!' );
    	
    	if($conn) {
	    	ldap_set_option ( $conn, LDAP_OPT_PROTOCOL_VERSION, 3 );
			ldap_set_option ( $conn, LDAP_OPT_REFERRALS, 0 ); // Binding to ldap server
    		$bd = ldap_bind($conn, $name, $pwd)  or die ('Could not bind');
    		if($bd){
				echo 'ldap_bind success';
			}else{
				echo 'ldap_bind fail';
			}
    	}
    	else{
			echo 'Unable to connect to AD server';
		}
    }
    
    public function toLogin() {
    	$this->title = '75Fan - Login';
    	$this->userName = $_SESSION['name'];
    	$this->p  = $_GET['p'];
    	$this->display();
    }
}