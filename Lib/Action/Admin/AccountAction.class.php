<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-5-13
 * Time: 下午1:29
 * To change this template use File | Settings | File Templates.
 */

class AccountAction extends AdminCommonAction{


    public function index() {
        $this->title = "Account";
        $this->display();
    }

    public function pageList() {
        $A = M('account');
        $data = $A->join('user on account.user_id=user.id')->field('account.id,name,balance')->select();
        $this->ajaxReturn($data,'json');
    }
}