<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-17
 * Time: 下午1:42
 * To change this template use File | Settings | File Templates.
 */

class ChargeAction extends Action{

    public function index() {
        $this->title = 'Charge';
        $this->display();
    }

    public function listChargesNeedConfirm() {
        $C = new ChargesModel();
        $data = $C->relation(true)->where(array('status'=>0))->select();
        if($data == null)$data = array();
        $this->ajaxReturn($data,'json');
    }

    public function confirm($id=0,$status=1) {
        $data['status'] = $status;
        $C = M('charges');
        $data = $C->where(array('id'=>$id,'status'=>0))->field('money,user_id')->find();
        if($data != null) {
            $m = $data['money'];
            $uid = $data['user_id'];
            $s = false;
            if($status == 1) {
                $B = M('account');
                $b = $B->where(array('user_id'=>$uid))->select();
                if($b != null) {
                    $b[0]['balance'] += $m;
                    $s = $B->save($b[0]);
                }
                else {
                    $b = array('user_id'=>$uid,'balance'=>$m);
                    $s = $B->add($b);
                }
            }
            else {
                $s = true;
            }
            if($s) {
                $res = $C->where(array('id'=>$id))->save(array('status'=>$status));
                if($res != false) {
                    $this->ajaxReturn(array('success'=>true),'json');
                    return;
                }
            }
            $this->ajaxReturn(array('success'=>false),'json');
            return;
        }
    }

    public function chargeRecord() {
        $this->title = 'Charge Records';

        $this->display();
    }

    public function pageCharges($query=null,$start=0,$limit=20) {
        $where = array('charges.status'=>array('neq',0));
        if($query != null && $query != "") {
            $where['user.name'] = array('like','%'.$query.'%');
        }

        $C = new ChargesModel();
        $data = $C->relation('User')->join('right join user on user_id=user.id')->
            field('charges.id,user.name,money,ts,charges.status,user_id')->where($where)->limit($start*$limit,$limit)->select();
        $this->ajaxReturn($data,'json');
    }

    public function allChargesCount($query=null) {
        $where = array('charges.status'=>array('neq',0));
        if($query != null && $query != "") {
            $where['user.name'] = array('like','%'.$query.'%');
        }

        $C = new ChargesModel();
        $count = $C->join('right join user on user_id=user.id')->where($where)->count();
        $this->ajaxReturn(array('total'=>(ceil($count/20))),'json');
    }

    public function test() {
        B('Check',$b);
        echo string($b)."...";
    }
}