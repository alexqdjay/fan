<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-29
 * Time: 下午10:15
 * To change this template use File | Settings | File Templates.
 */

class GoodsAction extends Action{

    public function goods() {
        $this->title = "Goods";
        $this->display();
    }

    public function good($storeId=null,$id=null) {
        if($id == null) {
            $this->title = "Good - New";
            $data['store_id'] = $storeId;
            $this->data = $data;
        }
       else {
           $G = M('goods');
           $this->title = "Good - ";
           $data = $G->where('id='.$id)->find();
            if($data != null) {
                $data['last_ts'] = date('Y-m-d',$data['last_ts']);
                $this->title .= $data['name'];
                $this->data = $data;
            }
       }
       $this->display();
    }

    public function save() {
        $G = D('goods');
        $data = $G->create();
        $id = $data['id'];
        $data['last_ts'] = strtotime($data['last_ts']);
        if($id == null) {
            $re = $G->add($data);
            $id = $re;
        }
        else {
            $re = $G->where('id='.$id)->save($data);
        }
        if($re != false) {
            $this->redirect('Goods/good',array('id'=>$id));
        }
    }

    public function stores() {
        $this->title = 'Stores';
        $this->display();
    }

    public function listGoods($storeId=0,$query=null,$start=0,$limit=20) {
        $G = M('goods');

        $whereCondition = array('store_id'=>$storeId);
        $whereCondition['status'] = array('in','0,1');
        $whereCondition['last_ts'] = array('lt',9999999999);
        if($query != null) {
            $whereCondition['name'] = array('like','%'.$query.'%');
        }

        $data = $G->where($whereCondition)->limit($limit*$start,$limit)->select();
        if($data == null) {
            $data = array();
        }

        $this->ajaxReturn($data,'json');
    }

    public function allCount($storeId=0,$query=null) {
        $whereCondition = array('store_id'=>$storeId);
        if($query != null) {
            $whereCondition['name'] = array('like','%'.$query.'%');
        }
        $G = M('goods');
        $count = $G->where($whereCondition)->count();
        $this->ajaxReturn(array('total'=>$count),'json');
    }

    public function listStores($query=null,$start=0,$limit=20) {
        $S = M('store');
        $whereCondition['active'] = array('in','0,1');
        if($query != null) {
            $whereCondition['name'] = array('like','%'.$query.'%');
        }
        $data = $S->where($whereCondition)->limit($limit*$start,$limit)->select();
        if($data == null) {
            $data = array();
        }

        $this->ajaxReturn($data,'json');
    }

    public function allStoreCount($query=null) {
        $whereCondition = array();
        if($query != null) {
            $whereCondition['name'] = array('like','%'.$query.'%');
        }
        $G = M('store');
        $count = $G->where($whereCondition)->count();
        $this->ajaxReturn(array('total'=>$count),'json');
    }

    public function store($id=null) {
        if($id != null) {
            $S = M('store');
            $where['id'] = $id;
            $data = $S->where($where)->find();
        }
        if($data == null) {
            $this->title = '75fan - New';
        }
        else {
            $this->title = '75fan - '.$data['name'];
            $this->data = $data;
        }
        $this->display();
    }
}