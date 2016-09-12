<?php

namespace Home\Controller;
use Think\Controller;

class GroupController extends CommonController{
	public function index(){
		// $this->verify= isVerify($uid);
		$data['pid'] = 0;
		// $a = '{"ecard":0,"mobile":0,"email":1}';
		// p(json_decode($a));
		// exit;

		$this->group = M("Group")->where($data)->select();
		$this->display();
	}

	public function reg(){
		if(IS_POST){
			p($_POST);
			if(empty($_POST['year']) || empty($_POST['month'])){
				$this->error('加入年或月不能为空');
			}
			$data["join_time"] = mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']);
			$data["uid"] = $_SESSION['hzauUser']['id'];
			$data["gid"] = $_POST['gid'];
			$res = D("UserGroup")->insert($data);
		}else{
			if(!isset($_GET['gid'])||empty($_GET['gid'])){
				$this->error('参数错误');
			}
			$this->group = getGroupInfo($_GET['gid']);
			
			

			//增加基础验证
			//$groupInfo = M("Group")->where('gid='.$_GET['gid'])->find();
			// $config = array();
			// $config = json_decode($groupInfo['config']);
			// p($config->rule);
			// checkVerify($config->rule);
			// exit;

			// $this->dep = getChildDepartment(intval($_GET['gid']));

			$this->display();
		}
	}
}