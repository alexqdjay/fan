<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-29
 * Time: 下午10:15
 * To change this template use File | Settings | File Templates.
 */

class GoodsAction extends AdminCommonAction{

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

        $data = $G->where($whereCondition)->limit($limit*$start,$limit)->order('id desc')->select();
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

    public function dining($page=1,$query=null) {
        $Dining = M('goods');
        $this->title = "75Fan -Admin Dining";
        if(!$page) {
            $page = 0;
        }
        $condition['category'] = 'meal';
        if($query) {
            $condition['name'] = array('like','%'.$query.'%');
        }
        $this->count = $Dining->where($condition)->count()/20;

        $data = $Dining->where($condition)->order('id desc')->page($page,20)->select();
        $this->data = $data;
        $this->display();
    }

    public function addDining($gid=0,$ts=0) {
        $date = new DateTime();

        $G = M('goods');
        $g = $G->where(array('id'=>$gid))->select();

        $D = M('dining');
        $data = array('name'=>$g[0]['name'],'price'=>$g[0]['price'],'time'=>$ts/1000,'goods_id'=>$gid);
        $id = $D->add($data);

        if($id != false) {
            $this->ajaxReturn(array('success'=>$id),'json');
        } else {
            $this->ajaxReturn(array('success'=>-1),'json');
        }

    }

    public function updateDining($id=0,$time=0) {
        $D = M('dining');
        $data = $D->where(array('id'=>$id))->select();

        if($data != null && count($data)>0) {
            $data[0]['time'] = $time/1000;
            $res = $D->save($data[0]);
        }
    }

    public function deleteDining($id =0) {
        $D = M('dining');
        $data = $D->where(array('id'=>$id))->delete();
        echo $data;
    }

    public function loadDiningData($start=0,$end=0) {
        $D = M('dining');
        $datas = $D->where(array('time'=>array(array('EGT',$start),array('LT',$end),'and')))->select();
        foreach($datas as &$data) {
            $data['start'] = $data['time'];
            $data['title'] = $data['name'];
        }
        $this->ajaxReturn($datas,'json');
    }

    public function loadGoods($id=0) {
        $G = M('goods');
        $g = $G->where(array('id'=>$id))->select();
        if($g != null) {
            $this->ajaxReturn($g[0],'json');
        }
        else {
            $this->ajaxReturn(array(),'json');
        }
    }

    private function changeTime($i) {
        switch($i) {
            case 0:return 'All';
            case 1:return 'Mon';
            case 2:return 'Tus';
            case 3:return 'Wed';
            case 4:return 'Thu';
            case 5:return 'Fri';
            case 6:return 'Sat';
            case 7:return 'Sun';
        }
        return 'All';
    }
}