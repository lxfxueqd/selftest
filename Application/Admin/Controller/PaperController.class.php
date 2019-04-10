<?php
   namespace Admin\Controller;
   use Think\Controller;
   
   class PaperController extends Controller{
   	 //试卷管理
	 public function index(){
	 	//搜索	
	 	$map = I();
		if(isset($where['paper_name']))
		   $where['sep_paper_name'] = array('LIKE', $where['paper_name'].'%');
		//试卷信息
		$user = M('st_exam_paper');
		$data = $user->where($where)->select();
		
		$this->assign('map', $map);
		$this->assign('data', $data);
		
		$this->display();
	 }

       //审核通过
       public function allow(){
           $id = I('get.id');
           $data['sep_paper_id'] = $id;
           $data['sep_status'] = 1;
           //更新学生表
           $result = M('st_exam_paper')->save($data);
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
           $data['sep_paper_id'] = $id;
           $data['sep_status'] = 1;
           //更新学生表
           $result = M('st_exam_paper')->save($data);
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