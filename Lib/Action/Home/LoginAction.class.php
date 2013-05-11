<?php

require('Lib/Service/LoginUtil.php');

class LoginAction extends Action{

	private $url = 'ldap://192.168.51.131:389';
	private $fix = '@corp.eccom.com.cn';

	public function login() {
		$name = $_POST['name'];
		$pwd = $_POST['pwd'];
		$minfo = $_GET['p'];
		
		if($name == null || $name=="" || $pwd == null || $pwd == "")echo "no user or pwd";
		$name = trim($name);
		$pwd = trim($pwd);
		
		$user = M('User');
		$data = $user->where(array('name'=>$name))->select();
		
		if($data == null || count($data) ==0) {
			echo 'no user as '.$name;
		}
		
		$u = $data[0];
		
		if(md5($pwd) == $u['pwd']) {
			$this->registUser($u['id'],$name);
			// success;
			$ar = split('-',$minfo);
			if($ar == null || count($ar) <2) {
				$ar = array('Index','index');
			}
			$this->redirect("$ar[0]/$ar[1]");
		}
		else {
			echo 'pwd error';
		}
	}
	
	public function logout() {
		session_unset();
	}
	
	public function checkLogin() {
		$hash = $_COOKIE['hash'];
		if(isset($hash)) {
			$session_ts = $_SESSION[$hash];
			$param = login_decode($hash);
			if(isset($session_ts) && $this->checkUser($param['ts'],$session_ts)) {
				$this->registUser($param['id'],$param['name']);
				return true;
			}
		}
		
		return false;
	}
	
	private function checkUser($ts,$session_ts) {
		if(isset($ts)) {
			if($ts == $session_ts) {
				if(time() - $ts <= 3600) {
					return true;
				}
			}
		}
		return false;
	}
	
	private function registUser($id,$name) {
		$ts = time();
		session_unset();
		$hash = login_encode($name,$id,$ts);
		$_SESSION[$hash] = $ts;
		$_SESSION['name'] = $name;
		$_SESSION['uid'] = $id;
		setcookie('hash',$hash,time()+60*60*24*30,'/',$_SERVER['HTTP_HOST']);
		setcookie('uu',$name,time()+60*60*24*30,'/',$_SERVER['HTTP_HOST']);
	}

    private function check() {
    	$b = false;
    	$user = $_SESSION['user'];
    	if($user == null) {
    		$b = false;
    	}
    	else {
    		$b =  $this->adCheck($user['user'],$user['pwd']);
    	}
    	
    	if($b) {
    		echo 'success';
    	}
    	else {
    		echo 'error';
    	}
    }
    
    private function adCheck($name,$pwd) {
    	$conn = ldap_connect($this->url);
    	
    	if($conn) {
	    	ldap_set_option ( $conn, LDAP_OPT_PROTOCOL_VERSION, 3 );
			ldap_set_option ( $conn, LDAP_OPT_REFERRALS, 0 ); // Binding to ldap server
    		$bd = ldap_bind($conn, $name.$this->fix, $pwd);
    		if($bd){
				return true;
			}else{
				return false;
			}
    	}
    	else{
			return false;
		}
    	
    }
    
//    public function checkLogin() {
//    	$name = 'alexqdjay';
//    	$id = 11920;
//    	$ts = time();
//    	$code = login_encode($name,$id,$ts);
//    	echo $code;
//    	echo "<br>---------<br>";
//    	dump(login_decode($code)).'<br>';
//    	//$this->hex2Name($hex);
//    	
//    	//$this->dec2hexString(15);
//    	
//    	echo "<br>---------<br>".ord('0');
//    }
    
   
    
}
?>