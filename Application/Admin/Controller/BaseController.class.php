<?php
   /*
    * 后台基类
    * 
    * */
    namespace Admin\Controller;
	use Think\Controller;
	
	class BaseController extends Controller{
		protected $userId = null;
		
		public function __construct(){
			parent::__construct();
			
			if(!session('?admin')){
				$this->error('请先登录', U('Admin/Login/login'));
			}
			$this->userId = session('admin.id');
		}
	}
?>