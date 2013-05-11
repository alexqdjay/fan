<?php

class FormAction extends Action{

    public function insert(){
        $Form   =   D('Form');
        if($Form->create()) {
            $result =   $Form->add($data);
            if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Form->getError());
        }
    }
    
    public function read($id=0){
    	S(array('type'=>'memcache','host'=>'192.168.96.93','port'=>'12000','prefix'=>'','expire'=>60));
    	G('b');
	    $Form   =   M('Form');
	    // 读取数据
	    $data =   $Form->cache('read_1',60)->find($id);
	    if($data) {
	        $this->vo =   $data;// 模板变量赋值
	    }else{
	        $this->error('数据错误');
	    }
	    G('e');
	   // echo G('b','e','m').'KB';
	    
	    $data = S('read_1');
	    trace($data,'user info','user');
	    $this->display();
	}
	
	public function update(){
	    $Form   =   D('Form');
	    if($Form->create()) {
	        $result =   $Form->save();
	        if($result) {
	            $this->success('操作成功！');
	        }else{
	            $this->error('写入错误！');
	        }
	    }else{
	        $this->error($Form->getError());
	    }
	}
}
?>