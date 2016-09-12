<?php

namespace Home\Model;
use Think\Model;

class UserGroupModel extends Model{
	private $_db = '';
	public function __construct(){
		$this->_db = M('UserGroup');
	}

	public function insert($data = array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		$data['update_time'] = time();
		$data['reg_ip'] = get_client_ip();
		$data['status'] = 0;//待审核
		p($data);
		return $this->_db->add($data);
	}
}
