<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-4-6
 * Time: 下午9:40
 * To change this template use File | Settings | File Templates.
 */

class StoreAction extends Action{

    public function search($name='') {
        $S = M('Store');
        $data = $S->where(array('name'=>array('LIKE',"%$name%")))->find();
        $this->ajaxReturn($data,'json');
    }

    public function save() {
        $S = D('store');
        $data = $S->create();
        $id = $data['id'];
        if($id == null) {
           $re = $S->add($data);
           $id = $re;
        }
        else {
           $re = $S->where("id=".$id)->save($data);
        }
        if($re != false) {
            $this->redirect("Goods/store",array('id'=>$id));
        }
        else {
            echo $re;
        }
    }

}