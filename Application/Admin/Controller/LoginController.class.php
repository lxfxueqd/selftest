<?php
   namespace Admin\Controller;
   use  Think\Controller;
   
   class LoginController extends Controller{
   	
	  public function login(){
	  	$this->display(); 
	  }   
	  
	  public function doLogin(){
	  	if(!IS_POST){
	  		E('页面不存在', 404);
	  	}
		
        $arr = I();
		$code = $arr['code'];
		$password = md5($arr['password']);

		$Verify = new \Think\Verify();
		$res1 = $Verify->check($code);
		
		if(!$res1){
			$response['code'] = -1;
			$response['msg'] = '验证码错误';
            $this->ajaxReturn($response);
		}
		
		$userObj = D('st_admin_inf');
		$result = $userObj->where('sai_username = "'.$arr['username'].'"')->find();
		
		if($result){
			if($password == $result['sai_password']){
				
				if($result['sai_status'] == 1){
					$admin['sai_admin_id'] = $result['sai_admin_id'];
					$admin['sai_login_ip'] = $_SERVER['REMOTE_ADDR'];
					$admin['sai_login_time'] = time();
					$userObj->data($admin)->save();
					$result = array_merge($result, $admin);
					session('admin',$result);
					
					$response['code'] = 1;
					$response['msg'] = '登录成功';
					$response['url'] = U('Admin/Index/index');
					$this->ajaxReturn($response);
				    
					}else{
						$response['code'] = -2;
						$response['msg'] = '您的账户已经被禁用';
						$this->ajaxReturn($response);
				    }	
				}else{
					$response['code'] = -3;
					$response['msg'] = '密码错误';
					$this->ajaxReturn($response);
				  }
				}else{
					$response['code'] = -4;
					$response['msg'] = '用户名不存在';
					$this->ajaxReturn($response);
				}
          return $response;
	  }
	  public function logout(){
	  	 session('admin',null);
		 $this->success('退出成功', U('Login/login'));
	  }
	  public function verify()
	{
		$Verify = new \Think\Verify();
		$Verify->codeSet = '2345689';
		$Verify->length = '5';
		
		$Verify->useCurve = false;
		ob_clean();
		$Verify->entry();
	}
} 
?>