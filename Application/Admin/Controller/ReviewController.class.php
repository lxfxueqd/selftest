<?php
   namespace Admin\Controller;
   use Think\Controller;
   
   class ReviewController extends Controller{
   	
	protected $designerobj = null;
	protected $review = null;
	
	public function __construct(){
		parent::__construct();
		$this->designerobj = M('users');
		$this->review = M('designer');
	}
   	
	 public function index(){
	 	//搜索
	 	$map = I();
		if(isset($where['name']))
		     $where['name'] = array('LIKE', $where['name'].'%');
		
		$total = $this->designerobj->where($where)->count();
		$Page = new \Think\Page($total, 100);
		$data = M('users as a')->join('sc_review as b on a.id = b.uid and b.state != 1')->where('review.state = 0')->where($where)->limit($Page->firstRow,$Page->listRows)->select();
//		->join('sc_review on designerobj.id = sc_review.uid')
		
		$this->assign('map',$map);
		$this->assign('data', $data);
		$this->assign('page', $Page);
	 	$this->display();
	 }
	 //审核通过
	 public function checkallow(){
	 	$id = I('get.id');
    	$uid = I('get.uid');
		$data['id'] = $id;
		$data['state'] = 1;
		$result = $this->review->save($data);
		//更新用户表
		$data1['id'] = $uid;
		$data1['type'] = 2;
		$result = M('users')->save($data1);
		
		$msg['code'] = 1;
		$msg['msg'] = '审核通过' ;
		$this->ajaxReturn($msg);
	 }
	 //审核拒绝
	 public function checkdeny(){
	 	$id = I('get.id');
		$uid = I('get.uid');
		$data['id'] = $id;
		$data['state'] = 2;
		$result = $this->review->data($data)->save();
		
		$msg['code'] = 1;
		$msg['msg'] = '审核未通过';
		$this->ajaxReturn($msg);
	 }
   }
?>