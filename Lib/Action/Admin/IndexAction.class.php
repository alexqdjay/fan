<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AdminCommonAction {

    public function index(){
        if(!$this->auth) {
            $this->redirect('../Index/toLogin',array('p'=>'Index-index'));
        }
        $this->title = 'Dashboard';
        $this->display();
    }
}