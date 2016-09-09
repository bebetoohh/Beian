<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	// // import("@.Util.RongCloud");其实不需要这个类库，只需要rest类库即可
    	// $result = send_sms_code('18602754789','8888');
    	// if($result){
    	// 	echo "成功";
    	// }else{
    	// 	echo "失败";
    	// }
    	// exit;
        $this->display();
    }
}