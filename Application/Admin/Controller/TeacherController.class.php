<?php
   namespace Admin\Controller;
   use Think\Controller;
   
   class TeacherController extends Controller{
   	 
	 public function index(){
	 	//搜索	
	 	$map = I();
		if(isset($where['teacher_id']))
		   $where['sti_teacher_id'] = array('LIKE', $where['teacher_id'].'%');
		//学生信息
		$user = M('st_teacher_inf');
		$data = $user->where($where)->select();
		
		$this->assign('map', $map);
		$this->assign('data', $data);
		
		$this->display();
	 }

       //审核通过
       public function allow(){
           $id = I('get.id');
           $data['sti_teacher_id'] = $id;
           $data['sti_status'] = 1;
           //更新学生表
           $result = M('st_teacher_inf')->save($data);
            if($result){
                $msg['code'] = 1;
                $msg['msg'] = '启用成功' ;
            }else{
                $msg['code'] = -1;
                $msg['msg'] = '启用失败' ;
            }

           $this->ajaxReturn($msg);
       }
       //审核拒绝
       public function deny(){
           $id = I('get.id');;
           $data['sti_teacher_id'] = $id;
           $data['sti_status'] = 1;
           //更新学生表
           $result = M('st_teacher_inf')->save($data);
           if($result){
               $msg['code'] = 1;
               $msg['msg'] = '禁用成功' ;
           }else{
               $msg['code'] = -1;
               $msg['msg'] = '禁用失败' ;
           }
           $this->ajaxReturn($msg);
       }
   }
?>