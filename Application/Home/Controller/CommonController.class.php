<?php

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		if(!$this->checkLogin()){
			$this->redirect("Public/index");
		}
	}

	public function checkLogin(){
		// return 1;
		if(session('hzauUser')){
			return 1;
		}
		return 0;
	}
}