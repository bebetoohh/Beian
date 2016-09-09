<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{
	public function reg(){
		if(IS_POST){
			$data = I('post.');
			if(!$data['ecard'] || empty($data['ecard'])){
				$this->error("一卡通未填写");
			}
			if(!$data['name'] || empty($data['name'])){
				$this->error("姓名未填写");
			}
			if(!$data['mobile'] || empty($data['mobile'])){
				$this->error("手机号未填写");
			}
			if(!$data['password'] || empty($data['password'])){
				$this->error("密码未填写");
			}
			$res = D("User")->insert($data);
			if($res){
				$this->success("注册成功，去登录吧",U('Public/index'));
			}else{
				$this->error("注册出错了");
			}
		}else{
			import("@.Util.SmsVerify");
			$verify = new \SmsVerify();
			$code  = $verify->entry();
			$this->display();
		}
	}
}