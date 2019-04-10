<?php
namespace Admin\Controller;
use Think\Controller;
class  AdminController extends Controller {
    public function index(){
    	$map = I();
		//dump($map);
		//$where = array_filter($map);
		//dump($where);echo $where['username'];die;
		if (isset($map['username']))
			$where['username'] = array('LIKE', $map['username'].'%');
			

		$total = D('st_admin_inf')->where($where)->count();
		//echo $total;die;
		$Page = new \Think\Page($total, 20);
		$data = D('st_admin_inf')->where($where)->limit($Page->firstRow, $Page->listRows)->order('sai_admin_id desc')->select();

		$this->assign('map', $map);
		$this->assign('data', $data);
		$this->assign('page', $Page->show());
		$this->display();
	}
	public function edit()
	{
		$user_id = I('get.id');	
		$info = M('Users')->where('id='.$user_id)->find();

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 用户信息修改操作
	 */
	public function doEdit()
	{
		if (IS_AJAX) {
			$data = I();
			$rs = M('Users')->save($data);

			if ($rs) {
				$msg['code'] = 1;
				$msg['msg'] = '修改成功';
			} else {
				$msg['code'] = 0;
				$msg['msg'] = '修改失败';
			}
			$this->ajaxReturn($msg);
		}
	}

	/**
	 * 修改密码
	 */
	public function editPwd()
	{
		$this->display('edit_pwd');
	}

	public function doEditPwd()
	{
		if (IS_POST) {
			$data = I();
			$data['password'] = md5(I('post.password'));
			$data['id'] = $this->userId;

			$rs = M('Admin')->data($data)->save();

			if ($rs) {
				$msg['code'] = 1;
				$msg['msg'] = '修改成功，下次登录即生效';
			} else {
				$msg['code'] = 0;
				$msg['msg'] = '修改失败';
			}
			$this->ajaxReturn($msg);
		}
	}

	/**
	 * 禁用用户
	 */
	public function deny()
	{
		$data['id'] = I('get.id');
		$data['state'] = -1;
		$rs = M('Users')->save($data);

		if ($rs) {
			$msg['code'] = 1;
			$msg['msg'] = '禁用成功';
		} else {
			$msg['code'] = 0;
			$msg['msg'] = '禁用失败';
		}
		$this->ajaxReturn($msg);
	}
}