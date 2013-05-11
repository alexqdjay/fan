<?php

include_once('Lib/Service/MsgService.class.php');

class MsgAction extends Action {
	
	public function index(){
		$this->title = '75Fan - Msg';
		$this->display();
		
	}
	
	public function syn() {
        session_write_close();

        $msgService = new MsgService();

        $uid = $_SESSION['uid'];
        $fts = $_SESSION['syn'];

        if($fts == null) {
            $fts = microtime(true);
            $_SESSION['syn'] = $fts;
        }
        $arr = array();
        $i = 0;
        do{
            if($i != 0) {
                sleep(1);
            }
            $tts = microtime(true);

            $arr = $msgService->loadLastestMsg($uid,$fts,$tts);

            $i++;
        }while(count($arr)==0 && $i<=5);
        $_SESSION['syn'] = $tts;

        $this->ajaxReturn($arr,'json');
    }

    public function send($tid,$msg) {
        session_write_close();
        $uid = $_SESSION['uid'];
        $msgService = new MsgService();
        echo $msgService->saveMsg($uid,(int)$tid,$msg);
    }

    public function test() {
        session_write_close();
        $this->ajaxReturn(array('success'=>true,'ts'=>microtime(true)),'json');
    }
}


?>