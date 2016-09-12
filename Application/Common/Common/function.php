<?php 
// 美化打印数组 调试用
function p($data){
    print "<pre>\n";
    print_r($data);
    print "\n</pre>";
}

/**
 * 发送 容联云通讯 验证码
 * @param  int $phone 手机号
 * @param  int $code  验证码
 * @return boole      是否发送成功
 */
function send_sms_code($phone,$code){
    //请求地址，格式如下，不需要写https://
    $serverIP='app.cloopen.com';
    //请求端口
    $serverPort='8883';
    //REST版本号
    $softVersion='2013-12-26';
    //主帐号
    $accountSid=C('RONGLIAN_ACCOUNT_SID');
    //主帐号Token
    $accountToken=C('RONGLIAN_ACCOUNT_TOKEN');
    //应用Id
    $appId=C('RONGLIAN_APPID');

    import("@.Util.Rest");
    $rest = new Rest($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    // 发送模板短信
    $result=$rest->sendTemplateSMS($phone,array($code,5),1);
    if($result==NULL) {
        return false;
    }
    if($result->statusCode!=0) {
        return  false;
    }else{
        return true;
    }
}

function getMd5Password($password){
    return md5($password.C('MD5_PRE'));
}

function checkRepeatUser($ecard = ''){
    if($ecard == ''){
        return false;
    }
    $data['ecard']=$ecard;
    $result = M('User')->where($data)->find();
    if($result){
        return false;
    }else{
        return ture;
    }
}

function getChildDepartment($pid=''){
    if(!isset($pid)||empty($pid)){
        return false;
    }
    $data['pid'] = $pid;
    return M('Group')->where($data)->select();
}

function checkVerify($cond = array()){
    if(!isset($_SESSION['hzauUser'])||empty($_SESSION['hzauUser'])){
        return 0;
    }
    $userVerify = json_decode($_SESSION['hzauUser']['verify']);
    foreach ($cond as $key => $value) {
        if($userVerify->$value)
            {
                echo $value.'已经验证<br>';
            }else{
                echo $value."未验证<br>";
        }
    }
    p($userVerify);
}

function getGroupInfo($gid = ''){
    if(!isset($gid)||empty($gid)){
        return false;
    }
    $map['gid']=$gid;
    return M('Group')->where($map)->find();
}

?>