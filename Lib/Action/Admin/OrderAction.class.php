<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-5-14
 * Time: 上午10:24
 * To change this template use File | Settings | File Templates.
 */

class OrderAction extends AdminCommonAction{


    public function index() {
        if(!$this->auth) {
            $this->redirect('../Index/toLogin',array('p'=>'Index-index'));
            return;
        }
        $this->title = "75Fan - Admin Orders";
        $this->display();
    }

    public function listOrders($from=0,$to=9999999999) {
        $O = M('orders');
        $data = $O->join('user on user_id=user.id')->join('dining on dining_id=dining.id')->
            where(array('orders.status'=>1,'ts'=>array('egt',$from)))->field('orders.*,user.name as user,dining.name,dining.price')->order('orders.id desc')->select();
        $this->ajaxReturn($data,'json');
    }

}