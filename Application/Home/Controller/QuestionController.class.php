<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2019/3/29
 * Time: 20:51
 */

namespace Home\Controller;
use Think\Controller;

class QuestionController extends Controller{
    public function index(){
        $where['sqd_teacher_id'] = session('user.sti_teacher_id');
        $total = M('st_question_data')->where($where)->count();
        $Page = new \Think\Page($total, 6);
        $data = M('st_question_data')->limit($Page->firstRow, $Page->listRows)->order('sqd_question_id desc')->where($where)->select();

        $this->assign('data', $data);
        $this->assign('page', $Page->show());
        $this->display();
        $this->display();
    }

    //录入试题页面
    public function enterQuestion(){
        //获取试卷编号
        $paperId = $_GET['paperId'];
        if(''!=$paperId && null !=$paperId){
            $this->assign('paperId',$paperId);
        }
        //获取试卷信息和试题类型
        $questKind = M('st_question_kind')->select();
        $this->assign('questKind',$questKind);
        $this->display();
    }
    //创建试卷信息
    //创建试卷信息
    public function doEnterQuestion(){
        if(!$_POST){
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常!';
            $this->ajaxReturn($response);
        }
        //数据入库
        $resquestData = I();
        $paperId = $resquestData['paperId'];
        $questKind = $resquestData['questKind'];
        $paperQuestId = $resquestData['questId'];
        $questContent = $resquestData['questContent'];
        $questionId = '86'.date('YmdHis', time()).rand(1000,9999);
        $crtTime = date('Y-m-d H:i:s', time());
        $updTime = date('Y-m-d H:i:s', time());
        $teacherId = session('user.sti_teacher_id');
        $questDB = M('st_question_data');
        if(''==$paperQuestId || null==$paperQuestId || ''==$questContent || null==$questContent){
            $response['code'] = '-1';
            $response['msg'] = '数据不能为空!';
            $this->ajaxReturn($response);
        }
        //选择题
        if($questKind == '10'){
            $questData1['sqd_question_id'] =  $questionId;
            $questData1['sqd_kind_id'] =  $questKind;
            $questData1['sqd_content'] =  $questContent;
            $questData1['sqd_optiona'] =  $resquestData['chooseA'];
            $questData1['sqd_optionb'] =  $resquestData['chooseB'];
            $questData1['sqd_optionc'] =  $resquestData['chooseC'];
            $questData1['sqd_optiond'] =  $resquestData['chooseD'];
            $questData1['sqd_answer'] =  $resquestData['answerChoose'];
            $questData1['sqd_teacher_id'] = $teacherId;
            $questData1['sqd_create_time'] = $crtTime;
            $questData1['sqd_update_time'] = $updTime;
            $questAdd = $questDB ->data($questData1) ->add();
            if($questAdd){
                $addResult = '01';
            }else{
                $addResult = '02';
            }
        }else{//其他类型题目
            $questData2['sqd_question_id'] =  $questionId;
            $questData2['sqd_kind_id'] =  $questKind;
            $questData2['sqd_content'] =  $questContent;
            $questData2['sql_answer'] =  $resquestData['answer'];
            $questData2['sqd_teacher_id'] = $teacherId;
            $questData2['sqd_create_time'] = $crtTime;
            $questData2['sqd_update_time'] = $updTime;
            $questAdd = $questDB ->data($questData2) ->add();
            if($questAdd){
                $addResult = '01';
            }else{
                $addResult = '02';
            }
        }
        if($addResult == '01' &&( ''==$paperId || null==$paperId)){
            $response['code'] = '1';
            $response['msg'] = '录入成功！';
            $response['url'] = U('Home/Question/index');
            $this->ajaxReturn($response);
        }elseif($addResult == '01' && ''!=$paperId && null!=$paperId){
            $paperData['spq_id'] = '96'.date('YmdHis', time()).rand(1000,9999);
            $paperData['spq_number'] = $paperQuestId;
            $paperData['spq_question_id'] = $questionId;
            $paperData['spq_paper_id'] = $paperId;
            $paperData['spq_user_id'] = session('user.sti_teacher_id');
            $paperData['spq_create_time'] = $crtTime;
            $paperData['spq_update_time'] = $updTime;
            $paperQuestAdd = M('st_paper_question')->data($paperData)->add();
            if($paperQuestAdd){
                $response['code'] = '1';
                $response['msg'] = $paperId.'录入成功！';
                $response['url'] = U('Home/Question/index');
                $this->ajaxReturn($response);
            }else{
                $response['code'] = '-1';
                $response['msg'] = '入库异常!';
                $this->ajaxReturn($response);
            }
        }else{
            $response['code'] = '-1';
            $response['msg'] = '入库异常!';
            $this->ajaxReturn($response);
        }
    }
}