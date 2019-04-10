<?php
/**
 * Created by PhpStorm.
 * User: 考试
 * Date: 2019/3/26
 * Time: 21:51
 */

namespace Home\Controller;
use Think\Controller;
//个人中心
class UserController extends Controller{
    public function index(){
        $this->display();
    }

    //录入试题页面
    public function examCreate(){
        $where['sep_teacher_id'] =  session('user.sti_teacher_id');
        $paper = M('st_exam_paper')->where($where)->select();
        $this->assign('paper',$paper);
        $this->display();
    }
    //创建试卷信息
    public function doExamCreate(){
        if(!$_POST){
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常!';
            $this->ajaxReturn($response);
        }
        ;
        //数据入库
        $resquestData = I();
        $paperId = $resquestData['paper'];
        $examName = $resquestData['examName'];
        $startTime = $resquestData['startTime'];
        $endTime = $resquestData['endTime'];
        $examLength = $resquestData['examLength'];
        if(''==$examName || null ==$examName){
            $response['code'] = '-1';
            $response['msg'] = '考试名称不能为空';
        }elseif(''==$startTime || null ==$startTime){
            $response['code'] = '-1';
            $response['msg'] = '考试开始时间不能为空';
        }elseif(''==$endTime || null ==$endTime){
            $response['code'] = '-1';
            $response['msg'] = '考试截止时间不能为空';
        }elseif(''==$examLength || null ==$examLength){
            $response['code'] = '-1';
            $response['msg'] = '考试时长不能为空';
        }else{
            //考试数据赋值
            $examData['sei_exam_id'] = '33'.date('YmdHis', time()).rand(1000,9999);
            $examData['sei_exam_name'] = $examName;
            $examData['sei_paper_id'] = $paperId;
            $examData['sei_teacher_id'] = session('user.sti_teacher_id');
            $examData['sei_start_time'] = $startTime;
            $examData['sei_end_time'] = $endTime;
            $examData['sei_length'] = $examLength;
            $examData['sei_status'] = '1';
            $examData['sei_create_time'] = date('YmdHis', time());
            $examData['sei_update_time'] = date('YmdHis', time());
            //数据入库
            $addResult = M('st_exam_inf')->data($examData)->add();
            if(!$addResult){
                $response['code'] = '-1';
                $response['msg'] = '考试创建失败！入库异常！';
            }else{
                $response['code'] = '1';
                $response['msg'] = '考试创建成功！';
                $response['url'] = U('Home/Exam/index');
            }
        }
        $this->ajaxReturn($response);
    }
}