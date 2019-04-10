<?php
/**
 * Created by PhpStorm.
 * User: 登录
 */

namespace Home\Controller;
use Think\Controller;


class LoginController extends Controller{
    public function login()
    {
        $this->display();
    }
    //登录
    public function doLogin(){
        if(!$_POST){
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常';
            $this->ajaxReturn($response);
        }

        $resquest = $_POST;
        $userName = $resquest['username'];
        $password = md5($resquest['password']);
        $userType = $resquest['usertype'];
        $equalData ='';
        $loginCode ='';
        if($userType == '1'){
            $userInf = M('st_student_inf')->where('ssi_student_id = "'.$userName.'" or ssi_username = "'.$userName.'"')->find();
            if($userInf){
                if($password == $userInf ['ssi_password']){
                    $equalData = '01';
                }else {
                    $equalData = '02';
                }
            }else{
                $response['code'] = '-1';
                $response['msg'] = '该用户不存在';
                $this->ajaxReturn($response);
            }

        }elseif($userType == '2'){
            $userInf = M('st_teacher_inf')->where('sti_teacher_id = "'.$userName.'" or sti_username = "'.$userName.'"')->find();
            if($userInf){
                if($password == $userInf ['sti_password']) {
                    $equalData = '01';
                }else {
                    $equalData = '02';
                }
            }else{
                $response['code'] = '-1';
                $response['msg'] = '该用户不存在';
                $this->ajaxReturn($response);
            }
        }else{
            $response['code'] = '-1';
            $response['msg'] = '请选择用户类型';
            $this->ajaxReturn($response);
        }
        if($equalData == '01') {
            if ($userType == '1') {
                if ($userInf['ssi_status'] == 1) {
                    $loginData['ssi_student_id'] = $userInf['ssi_student_id'];
                    $loginData['ssi_login_ip'] = $_SERVER['REMOTE_ADDR'];
                    $loginData['ssi_login_time'] = date('YmdHis', date('YmdHis', time()));
                    $resultUp = M('st_student_inf')->data($loginData)->save();
                    if($resultUp){
                        $loginData['type'] = '1';
                        $userInf = array_merge($userInf, $loginData);
                        session('user', $userInf);
                        $loginCode = '01';

                    }else {
                        $loginCode = '00';
                    }
                }else{
                    $loginCode = '02';
                }
            } elseif ($userType == '2') {
                if ($userInf['sti_status'] == 1) {
                    $loginData['sti_teacher_id'] = $userInf['sti_teacher_id'];
                    $loginData['sti_login_ip'] = $_SERVER['REMOTE_ADDR'];
                    $loginData['sti_login_time'] = date('YmdHis', time());
                    $resultUp = M('st_teacher_inf')->data($loginData)->save();
                    if($resultUp){
                        $loginData['type'] = '2';
                        $userInf = array_merge($userInf, $loginData);
                        session('user', $userInf);
                        $loginCode = '01';
                    }else {
                        $loginCode = '00';
                    }
                }else{
                    $loginCode = '02';
                }
            }
            if($loginCode == '01'){
                $response['code'] = 1;
                $response['msg'] = '登录成功';
                $response['url'] = 'Index/index';
                $this->ajaxReturn($response);
            }elseif($loginCode == '02'){
                $response['code'] = -2;
                $response['msg'] = '您的账户已经被禁用';
                $this->ajaxReturn($response);
            }elseif($loginCode == '00'){
                $response['code'] = -1;
                $response['msg'] = '入库失败！';
                $this->ajaxReturn($response);
            }
        }else{
                $response['code'] = -3;
                $response['msg'] = '密码错误';
                $this->ajaxReturn($response);
        }
    }

    public function register()
    {
        $this->display();
    }

    //注册信息
    public function doRegister(){
        if(!$_POST){
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常';
            $this->ajaxReturn($response);
        }
        $resquest = I();
        $userName = $resquest['username'];
        $password = md5($resquest['password']);
        $userType = $resquest['usertype'];
        if($userType == '1'){
            $userData['ssi_student_id'] = $userName;
            $userData['ssi_username'] = $userName;
            $userData['ssi_password'] = $password;
            $userData['ssi_email'] = '';
            $userData['ssi_phonenumber'] = '';
            $userData['ssi_major_id'] = '0';
            $userData['ssi_status'] = '1';
            $userData['ssi_login_ip'] = $_SERVER['REMOTE_ADDR'];
            $userData['ssi_login_time'] = date('YmdHis', time());
            $userData['ssi_create_time'] = date('YmdHis', time());
            $userData['ssi_update_time'] = date('YmdHis', time());
            $result = M('st_student_inf')->data($userData)->add();
        }elseif($userType == '2'){
            $teachData['sti_teacher_id'] = $userName;
            $teachData['sti_username'] = $userName;
            $teachData['sti_password'] = $password;
            $teachData['sti_email'] = '';
            $teachData['sti_phonenumber'] = '';
            $teachData['sti_status'] = '1';
            $teachData['sti_login_ip'] = $_SERVER['REMOTE_ADDR'];
            $teachData['sti_login_time'] = date('YmdHis', time());
            $teachData['sti_create_time'] = date('YmdHis', time());
            $teachData['sti_update_time'] = date('YmdHis', time());
            $result = M('st_teacher_inf')->data($teachData)->add();
        }else{
            $response['code'] = '-1';
            $response['msg'] = '请选择用户类型';
            $this->ajaxReturn($response);
        }
        if($result){
            $response['code'] = '1';
            $response['msg'] = '注册成功！';
            $response['url'] = 'Index/index';
            $this->ajaxReturn($response);
        }else{
            $response['code'] = '-1';
            $response['msg'] = '入库异常！';
            $this->ajaxReturn($response);
        }
    }

    public function logout(){
        session('user',null);
        $this->success('退出成功', U('Index/login'));
    }
}