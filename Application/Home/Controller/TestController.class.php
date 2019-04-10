<?php
/**
 * Created by PhpStorm.
 * User: 考试
 * Date: 2019/3/26
 * Time: 21:51
 */

namespace Home\Controller;
use Think\Controller;
//在线练习
class TestController extends Controller{
    public function index(){

        $this->display();
    }

    //录入试题页面
    public function enterQuestion(){
        $questKind = M('st_question_kind')->select();
        $this->assign('questKind',$questKind);
        $this->display();
    }
    //创建试卷信息
    public function doEnterQuestion(){
        if(!$_POST){
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常!';
            $this->ajaxReturn($response);
        }
        //数据入库
        $resquestData = I();
        $questKind = $resquestData['questKind'];
        $questId = $resquestData['questId'];
        $questContent = $resquestData['questContent'];
        if(''==$questId || null==$questId || ''==$questContent || null==$questContent){
            $response['code'] = '-1';
            $response['msg'] = '数据不能为空!';
            $this->ajaxReturn($response);
        }
        //选择题
        if($questKind == '10'){
            $questData1[''] =  $questKind;
            $questData1[''] =  $questId;
            $questData1[''] =  $questContent;
            $questData1[''] =  $resquestData['chooseA'];
            $questData1[''] =  $resquestData['chooseB'];
            $questData1[''] =  $resquestData['chooseC'];
            $questData1[''] =  $resquestData['chooseD'];
            $questData1[''] =  $resquestData['answerChoose'];
        }else{
            $questData2[''] =  $questKind;
            $questData2[''] =  $questId;
            $questData2[''] =  $questContent;
            $questData2[''] =  $resquestData['answer'];
        }



        $paperData['sep_paper_id'] = '86'+date('YmdHis', time())+rand(1000,9999);
        $paperData['sep_paper_name'] = $resquestData['paperName'];
        $paperData['sep_grade'] = $resquestData['grade'];
        if(''==$subjectId || null == $subjectId || $subjectId == '0'){
            $paperData['sep_subject_id'] = 0;
        }else{
            $paperData['sep_subject_id'] = $subjectId;
        }
        if(''==$chapterId || null == $chapterId || $chapterId == '0'){
            $paperData['sep_chapter_id'] = 0;
        }else{
            $paperData['sep_chapter_id'] = $subjectId;
        }
        $paperData['sep_type'] = 1;
        $paperData['sep_status'] = 1;
        $paperData['sep_create_time'] = date('YmdHis', time());
        $paperData['sep_update_time'] = date('YmdHis', time());
        //题目种类赋值
        $kindData['spn_paper_id'] = $paperData['sep_paper_id'];
        
        $addResult = M('st_exam_paper')->data($paperData)->add();

        $response['msg'] = date('YmdHis', time());
        $this->ajaxReturn($response);
    }
}