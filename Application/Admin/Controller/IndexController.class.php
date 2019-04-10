<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(!session('?admin')){
				$this->error('请先登录', U('Admin/Login/login'));
			}else{
				$data['user_total'] = M('st_student_inf')->count();
	        	$data['designer_total'] = M('st_teacher_inf')->count();
	        	$data['user_bite'] =0.5;//0;// number_format(($data['user_total']/($data['user_total'] + $data['designer_total'])), 3);
				$data['designer_bite'] = 0.5;//number_format(($data['designer_total']/($data['user_total'] + $data['designer_total'])),3);
				$data['model_total'] = 0;//M('Model')->count();
				$data['link_total'] =0;// M('Links')->count();
				$data['user_incheck'] =0;// M('Users')->where('type=1 and state=1')->count();
				$data['user_uncheck'] =0;// M('Users')->where('type=1 and state=0')->count();
				$data['designer_incheck'] =0;// M('designer')->where('state=0')->count();
				$data['designer_uncheck'] = 0;//M('users')->where('type=2')->count();

		$this->assign('data', $data);
				$this->display();
			}
	}
}