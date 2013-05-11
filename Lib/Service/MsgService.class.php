<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-13
 * Time: 下午9:05
 * To change this template use File | Settings | File Templates.
 */
class MsgService {

    public function loadLastestMsg($uid,$fts,$tts) {

        $Msg = new MsgModel();
        $where = array('tid'=>$uid,'ts'=>array('$gt'=>$fts,'$lte'=>$tts));

        $arr = $Msg->field('sid,tid,msg,ts')->where($where)->order('ts')->select();
        $res = array();
        foreach($arr as $key=>$data) {
            array_push($res,$data);
        }

        return $res;
    }

    public function saveMsg($sid,$tid,$msg) {
        $Msg = new MsgModel();
        $data = array(
            'sid'=>$sid,
            'tid'=>$tid,
            'msg'=>$msg,
            'ts'=>microtime(true)
        );
        $Msg->add($data);
    }


}
