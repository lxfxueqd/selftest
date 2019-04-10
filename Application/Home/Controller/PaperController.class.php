<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2019/3/29
 * Time: 20:51
 */

namespace Home\Controller;
use Think\Controller;

class PaperController extends Controller{
    public function index(){
        $where['sep_teacher_id'] =  session('user.sti_teacher_id');
        $total = M('st_exam_paper')->where($where)->count();
        $Page = new \Think\Page($total, 6);
        $data = M('st_exam_paper')->where($where)->limit($Page->firstRow, $Page->listRows)->order('sep_paper_id desc')->select();

        $this->assign('data', $data);
        $this->assign('page', $Page->show());
        $this->display();
    }

    //创建试卷页
    public function paperCreate(){
        $questKind = M('st_question_kind')->select();
        $this->assign('questKind',$questKind);
        $this->display();
    }
    //创建试卷信息
    public function doPaperCreate(){
        if(!$_POST){
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常!';
            $this->ajaxReturn($response);
        }
        //数据入库
        $resquestData = I();
        if(''==$resquestData['paperName'] || null == $resquestData['paperName'] ||  ''==$resquestData['grade'] || null == $resquestData['grade']){
            $response['code'] = '-1';
            $response['msg'] = '数据不能为空!';
            $this->ajaxReturn($response);
        }elseif($resquestData['grade'] == '0'){
            $response['code'] = '-1';
            $response['msg'] = '总分不能为0!';
            $this->ajaxReturn($response);
        }
        $subjectId = $resquestData['subjectId'];
        $chapterId = $resquestData['chapterId'];
        $paperData['sep_paper_id'] = '86'.date('YmdHis', time()).rand(1000,9999);
        $paperData['sep_paper_name'] = $resquestData['paperName'];
        $paperData['sep_grade'] = $resquestData['grade'];
        $paperData['sep_teacher_id'] = session('user.sti_teacher_id');
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
        $addResult = M('st_exam_paper')->data($paperData)->add();
        if(!$addResult){
            $response['code'] = '-1';
            $response['msg'] = '入库失败!';
            $this->ajaxReturn($response);
        }
        $paperId = $paperData['sep_paper_id'];
        foreach($resquestData as $key => $val){
            $keyStr = substr($key,2,6);
            $keyGrade = substr($key,2,5);
            $keyId = substr($key,0,2);
            if( $keyStr == 'Counts' && $keyGrade != 'Grade'){
                $kindData['spn_kind_id'] = $keyId;
                $kindData['spn_counts'] = $val;
                $kindData['spn_paper_id'] = $paperId;
                $kindData['spn_create_time'] = date('YmdHis', time());
                $kindData['spn_update_time'] = date('YmdHis', time());
                $kindAdd = M('st_paper_kind_num')->data($kindData)->add();
                if($kindAdd){
                    continue;
                }else{
                    $response['code'] = '-1';
                    $response['msg'] = '入库失败!';
                    $this->ajaxReturn($response);
                }
            }elseif($keyStr != 'Counts'&& $keyGrade == 'Grade'){
                $where['spn_paper_id'] = $paperId;
                $where['spn_kind_id'] = $keyId;
                $kindDataUpd['spn_grade'] = $val;
                $kindDataUpd['spn_update_time'] = date('YmdHis', time());
                $kindUpd = M('st_paper_kind_num')->where($where)->save($kindDataUpd);
                if($kindUpd){
                    continue;
                }else{
                    $response['code'] = '-1';
                    $response['msg'] = '录入失败!';
                    $this->ajaxReturn($response);
                }
            }else{
                continue;
            }
        }
        $response['code'] = '1';
        $response['msg'] = '试卷创建成功!';
        $response['url'] = U('Home/Paper/index');
        $this->ajaxReturn($response);
    }

    //更新试卷页
    public function paperUpdate(){
        $questKind = M('st_question_kind')->select();
        $this->assign('questKind',$questKind);
        $this->display();
    }
    //更新试卷信息
    public function doPaperUpdate(){
        if(!$_POST){
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常!';
            $this->ajaxReturn($response);
        }
        //数据入库
        $resquestData = I();
        if(''==$resquestData['paperName'] || null == $resquestData['paperName'] ||  ''==$resquestData['sep_grade'] || null == $resquestData['sep_grade']){
            $response['code'] = '-2';
            $response['msg'] = '数据不能为空!';
            $this->ajaxReturn($response);
        }elseif($resquestData['sep_grade'] == '0'){
            $response['code'] = '-2';
            $response['msg'] = '总分不能为0!';
            $this->ajaxReturn($response);
        }
        $subjectId = $resquestData['subjectId'];
        $chapterId = $resquestData['chapterId'];
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

    //试卷预览
    public function paperReview(){
        $questKind = M('st_question_kind')->select();
        $this->assign('questKind',$questKind);
        $this->display();
    }
}