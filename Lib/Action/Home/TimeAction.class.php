<?php

class TimeAction extends Action{

    public function now() {
    	$ts = time();
    	$xts = new DateTime();
    	date_time_set($xts,15,25,0);
    	$xts = $xts->getTimestamp() - $ts;
    	$time = array('time'=>$ts,'xts'=>$xts);
    	$this->ajaxReturn($time,'json');
    }
}
?>