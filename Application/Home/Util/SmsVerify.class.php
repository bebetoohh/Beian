<?php

class SmsVerify{
	protected $seKey = "beian";
	protected $expire = 600 ;//10分钟
	public function check($code){
		$key = $this->authcode($this->seKey);
		$secode = session($key);
		if(empty($code)||empty($secode)){
			return false;
		}
		if(NOW_TIME - $secode['verify_time'] > $this->expire){
			session($key,null);
			return false;
		}
		if($this->authcode($code) == $secode['verify_code']){
			session($key,null);
			return true;
		}

	}
	public function entry(){
		$code = rand(1000, 9999);
		//保存验证码
		$key  = $this->authcode($this->seKey);
		$mdcode = $this->authcode($code);
		$secode = array();
		$secode['verify_code'] = $mdcode;
		$secode['verify_time'] = NOW_TIME;
		return $code;
	}

    /* 加密验证码 */
    private function authcode($str){
        $key = substr(md5($this->seKey), 5, 8);
        $str = substr(md5($str), 8, 10);
        return md5($key . $str);
    }

}