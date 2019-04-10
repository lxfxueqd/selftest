<?php
   namespace Admin\Controller;
   use Think\Controller;
   
   class StudentController extends Controller{

       public function index(){
           //搜索
           $map = I();
           if(isset($where['student_id']))
               $where['st_student_id'] = array('LIKE', $where['student_id'].'%');
           //学生信息
           $user = M('st_student_inf');
           $data = $user->where($where)->select();

           $this->assign('map', $map);
           $this->assign('data', $data);

           $this->display();
       }

       //审核通过
       public function allow(){
           $id = I('get.id');
           $data['ssi_student_id'] = $id;
           $data['ssi_status'] = 1;
           //更新学生表
           $result = M('st_student_inf')->save($data);
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
           $data['ssi_student_id'] = $id;
           $data['ssi_status'] = 1;
           //更新学生表
           $result = M('st_student_inf')->save($data);
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