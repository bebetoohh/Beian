<?php

namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	private $_db = '';
	public function __construct(){
		$this->_db = M('User');
	}

	public function insert($data = array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		$data['password'] = getMd5Password($data['password']);
		$data['create_time'] = time();
		$data['reg_ip'] = get_client_ip();
		return $this->_db->add($data);
	}
}