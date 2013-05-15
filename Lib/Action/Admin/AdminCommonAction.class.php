<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-5-13
 * Time: 下午2:56
 * To change this template use File | Settings | File Templates.
 */

class AdminCommonAction extends Action{

    protected $auth = false;

    public function _initialize() {
        $this->auth = $this->checkUser();
    }

    private function checkUser() {
        $Login = A('Home/Login');
        $b = $Login->checkLogin();
        $uu = $_COOKIE['uu'];
        if($b && $uu != null) {
            $user = M('user')->where(array('name'=>$uu))->find();
            if($user != null && $user['group'] == 1) {
                return true;
            }
        }
        return false;
    }
}