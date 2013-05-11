<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-14
 * Time: 下午8:21
 * To change this template use File | Settings | File Templates.
 */

class TakeoutAction extends Action{

        public function index() {
            $this ->title = "外卖";
            $this->display();
        }

        public function listStore($query = null,$start=0,$limit=10) {
            $S = M('store');
            $data = $S->where("1=1")->limit($start*$limit,$limit)->select();
            $this->ajaxReturn($data,'json');
        }

        public function listStoreGoodsTop10($id=0) {
            $G = M('Goods');
            $data = $G->where(array('store_id'=>$id,'status'=>1,'last_ts'=>array('gt',time())))->limit(0,15)->select();
            if($data == null) {
                $data = array();
            }
            $this->ajaxReturn($data,'json');
        }
}
?>