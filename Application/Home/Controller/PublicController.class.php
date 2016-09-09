<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{
	public function reg(){
		import("@.Util.SmsVerify");
		$verify = new \SmsVerify();
		

		$code  = $verify->entry();

		
		$this->display();
	}
}