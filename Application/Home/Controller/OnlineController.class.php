<?php
/**
 * Created by PhpStorm.
 * User: 考试
 * Date: 2019/3/26
 * Time: 21:51
 */

namespace Home\Controller;
use Think\Controller;

class OnlineController extends Controller{


    public function index(){

        $total = D('st_exam_inf')->count();
        $Page = new \Think\Page($total, 3);
        $data = D('st_exam_inf')->alias('e')->limit($Page->firstRow, $Page->listRows)->order('sei_exam_id desc')->join('LEFT JOIN st_exam_paper p on e.sei_paper_id = p.sep_paper_id')->select();

        $this->assign('data', $data);
        $this->assign('page', $Page->show());
        $this->display();
    }

    //在线考试
    public function exam(){
        //获取考试数据
        $examId = $_GET['examId'];
        $pageNow = $_GET['p'];
        $studentId = session('user.ssi_student_id');
        $flowData['seg_exam_id'] = $examId;
        $flowData['seg_student_id'] = $studentId;
        $flowData['seg_status'] = '1';
        $flowData['seg_start_time'] = date('YmdHis', time());
        //判断考试是否已开始
        $where['seg_exam_id'] = $examId;
        $where['seg_student_id'] = session('user.ssi_student_id');
        $examCounts = M('st_exam_flow')->where($where)->count();
        if($examCounts == 0){
            $flowAdd = M('st_exam_flow')->data($flowData)->add();
            if(!$flowAdd){
                $response['code'] = '-1';
                $response['msg'] = '进入考试失败!';
                $this->ajaxReturn($response);
            }
        }

        //返回试题新
        $total = M('st_paper_question')->alias('q')->join('LEFT JOIN st_exam_inf e on q.spq_paper_id = e.sei_paper_id and e.sei_exam_id = '.$examId)->count();
        $Page = new \Think\Page($total, 1);
        $Page -> setConfig('prev','上一题');
        $Page -> setConfig('next','下一题');
        $Page -> setConfig('theme','%UP_PAGE% %DOWN_PAGE%');
        $data = M('st_question_data')->alias('d')->limit($Page->firstRow, $Page->listRows) ->join('JOIN st_paper_question p on d.sqd_question_id = p.spq_question_id')
            ->join('JOIN st_exam_inf e on p.spq_paper_id = e.sei_paper_id and e.sei_exam_id ='.$examId)
            ->join('LEFT JOIN st_grade_detail g on g.sgd_exam_id = e.sei_exam_id and g.sgd_question_id = d.sqd_question_id and g.sgd_student_id ='.$studentId)
            ->order('p.spq_number asc')
            ->select();
//        foreach ($data as $key => $val){
//            $ansWhere['sgd_exam_id'] = $val['sei_exam_id'];
//            $ansWhere['sgd_question_id'] = $val['sqd_question_id'];
//            $ansWhere['sgd_student_id'] = $studentId;
//             $counts = M('st_grade_detail')->where($ansWhere)->count();
//             if($counts == 1){
//                 $ansRes =  M('st_grade_detail')->where($ansWhere)->select();
//                 $data['ans'][answer] = $ansRes['sgd_answer'];
//             }else{
//                 $data['ans']['answer'] = '';
//             }
//        }
        $this->assign('examId', $examId);
        $this->assign('total',$total);
        $this->assign('pageNow',$pageNow);
        $this->assign('data', $data);
        $this->assign('page', $Page->show());
        $this->display();
    }

    //跳转下一个
    public function upToNext(){
        if(!$_POST) {
            $response['code'] = '-1';
            $response['msg'] = '提交失败!';
            $this->ajaxReturn($response);
        };
        //数据入库
        $resquestData = I();
        $examData['sgd_question_id'] = $resquestData['questId'];
        $examData['sgd_exam_id'] = $resquestData['examId'];
        $examData['sgd_student_id'] = session('user.ssi_student_id');
        $examData['sgd_status'] = 'N';
        $examData['sgd_create_time'] =  date('YmdHis', time());
        $examData['sgd_update_time'] =  date('YmdHis', time());
        $answer2 = $resquestData['answer2'];
        if(''!= $answer2 && null != $answer2){
            $examData['sgd_answer'] = $answer2;
        }else{
            $examData['sgd_answer'] = $resquestData['answer'];
        }
        //判断是否曾提交
        $whereData['sgd_question_id'] = $resquestData['questId'];
        $whereData['sgd_exam_id'] = $resquestData['examId'];
        $whereData['sgd_student_id'] = session('user.ssi_student_id');
        //统计试题是否已作答
        $subCounts = M('st_grade_detail')->where($whereData)->count();
        if($subCounts == 1){
            //更新答案
            $examUpd['sgd_answer'] =  $examData['sgd_answer'];
            $examUpd['sgd_update_time'] =  date('YmdHis', time());
            $flowAdd = M('st_grade_detail')->data($examUpd)->where($whereData)->save();
        }else{
            //入库
            $flowAdd = M('st_grade_detail')->data($examData)->add();
        }

        if(!$flowAdd){
            $response['code'] = '-1';
            $response['msg'] = '入库失败!';
        }else{
            $response['code'] = '1';
            $response['msg'] = '提交成功!';
        }
        $this->ajaxReturn($response);
    }
    //交卷
    public function endExam(){
        if(!$_POST) {
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常!';
            $this->ajaxReturn($response);
        };
        $request = I();
        $examId = $request['examId'];
        $studentId = session('user.ssi_student_id');
        //结束考试更新时间
        $whereFlow['seg_exam_id'] = $examId;
        $whereFlow['seg_student_id'] = $studentId;
        $flowData['seg_status'] = '2';
        $flowData['seg_end_time'] =date('YmdHis',time());
        $flowUpd = M('st_exam_flow')->where($whereFlow)->data($flowData)->save();
        if(!$flowUpd){
            $response['code'] = '-1';
            $response['msg'] = '考试结束异常!';
            $this->ajaxReturn($response);
        }
        //自动
        $response['code'] = '1';
        $response['msg'] = '交卷成功，考试结束！';
        $response['url'] = U('Home/Online/index');

    }

    public  function autoCorrect($examId,$studentId){
        $where['sgd_exam_id'] = $examId;
        $where['sgd_student_id'] = $studentId;
        //查询考试信息
        $result = M('st_grade_detail')->alias('g')->join('JOIN st')
            ->where($where)->select();
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
        if(!$_POST) {
            $response['code'] = '-1';
            $response['msg'] = '数据传输异常!';
            $this->ajaxReturn($response);
        };
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
                $response['url'] = U('Home/Online/index');
            }
        }
        $this->ajaxReturn($response);
    }
}