<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{

	public function index(){
		echo"请登陆";
	}
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
			if(!checkRepeatUser($data['ecard'])){
				$this->error("一卡通已经注册过");
			}
			$res = D("User")->insert($data);
			if($res){
				$this->success("注册成功，去登录吧",U('Index/index'));
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

	public function doLogin(){
		if(IS_POST){
			$data = I('post.');
			if(!$data['ecard'] || empty($data['ecard'])){
				$this->error("一卡通未填写");
			}
			if(!$data['password'] || empty($data['password'])){
				$this->error("密码未填写");
			}
			$map['ecard'] = $data['ecard'];
			$map['status'] = 1;
			$user = M("User")->where($map)->find();
			if(empty($user)){
				$this->error("用户信息有误");
			}
			p($user);
			if(getMd5Password($data['password']) != $user['password']){
				$this->error("密码错误");
			}
			session('hzauUser',$user); 
			$this->success("欢迎回来",U('Group/index'));
		}
	}

	public function logout(){
		session('hzauUser',null);
		$this->success("成功退出",U("Index/index"));
	}
}