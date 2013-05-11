<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-17
 * Time: 下午12:18
 * To change this template use File | Settings | File Templates.
 */

class UserAction extends Action{

    public function users() {
        $this->title = 'Users';
        $this->display();
    }

    public function listUsers($query=null,$start=0,$limit=10) {
        $U = M('User');
        $where = array();
        if($query != null){
            $where['name'] = array('like','%'.$query.'%');
        }
        $u = $U->where($where)->limit($start*$limit,$limit)->order('id')->select();
        $u = $u==null?array():$u;
        $this->ajaxReturn($u,'json');
    }

    public function allCount($query=null) {
        $where = array();
        if($query != null) {
            $where['name'] = array('like','%'.$query.'%');
        }
        $U = M('User');
        $d = $U->where($where)->count();
        $this->ajaxReturn(array('total'=>$d),'json');
    }
}