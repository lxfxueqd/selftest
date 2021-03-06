<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>试题录入</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="/selftest/Public/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="/selftest/Public/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/selftest/Public/css/bootstrap.min.css?v=1"  crossorigin="anonymous">
    <!-- Slick slider -->
    <link href="/selftest/Public/css/slick.css" rel="stylesheet">
    <!-- Gallery Lightbox -->
    <link href="/selftest/Public/css/magnific-popup.css" rel="stylesheet">
    <!-- Skills Circle CSS  -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/circlebars@1.0.3/dist/circle.css">


    <!-- Main Style -->
    <link href="/selftest/Public/css/style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Google Fonts Raleway -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
    <!-- Google Fonts Open sans -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">
    <script src="/selftest/Public/js/jquery-2.0.3.min.js"></script>

</head>
<body>

<!--START SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
</a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start Header -->
<header id="mu-hero">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light mu-navbar">
            <!-- Text based logo -->
            <a class="navbar-brand mu-logo" href="index.html"><span>计算机通识课程在线自测平台</span></a>
            <!-- image based logo -->
            <!-- <a class="navbar-brand mu-logo" href="index.html"><img src="/selftest/Public/images/logo.png" alt="logo"></a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mu-navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo U('Home/Index/index');?>">首页</a>
                    </li>
                    <?php if(!$_SESSION['user']):?>
                    <li class="nav-item"><a href="<?php echo U('Home/Index/login');?>">登录</a></li>
                    <li class="nav-item active"><a href="<?php echo U('Home/Index/register');?>">注册</a></li>
                    <?php endif; ?>
                    <?php if($_SESSION['user']['type'] == 2):?>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="<?php echo U('Home/Question/index');?>" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            题库
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Question/index');?>">题目列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Question/enterQuestion');?>">上传题目</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="<?php echo U('Home/Paper/index');?>" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            试卷管理
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Paper/index');?>">试卷列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Paper/paperCreate');?>">添加试卷</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Paper/index');?>">删除试卷</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="<?php echo U('Home/Exam/index');?>" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            考试安排
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Exam/index');?>">试卷列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Exam/examCreate');?>">添加试卷</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Exam/index');?>">删除试卷</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="blog.html" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            成绩一览
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="blog.html">查看成绩</a>
                            <a class="dropdown-item" href="blog-single.html">修改成绩</a>
                            <a class="dropdown-item" href="blog-single.html">生成成绩单</a>
                        </div>
                    </li>
                    <li class="nav-item "><a href="contact.html">个人中心</a></li>
                    <?php endif; ?>
                    <?php if($_SESSION['user']['type'] == 1):?>
                    <li class="nav-item"><a href="online-exam.html">在线考试</a></li>
                    <li class="nav-item"><a href="practice.html">在线练习</a></li>
                    <li class="nav-item"><a href="contact.html">查看成绩</a></li>
                    <li class="nav-item"><a href="contact.html">个人中心</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- End Header -->

<!-- Start slider area -->
<!-- Start Page Header area -->
<div id="mu-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-header-area">
                    <h1 class="mu-page-header-title">欢迎您，<?php echo ($_SESSION['user']['ssi_username']); ?>同学</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header area -->
<hr class="bs-docs-separator">

<div class="container">
    <div class="col-md-10">
        </br>
        <div class="">
            <div class="">
                <div>
                    <form id="ajaxForm"  method="post" onsubmit="return false">
                        <div><input style="display: none" name="examId" value="<?php echo ($examId); ?>"/></div>
                        <?php foreach ($data as $key => $val): ?>
                        <div><input style="display: none" name="questId" value="<?php echo ($val["spq_question_id"]); ?>"/></div>
                        <div><input style="display: none" id="questKind" name="questKind" value="<?php echo ($val["sqd_kind_id"]); ?>"/></div>
                        <p class="comment-form-comment">
                            <?php echo ($val["spq_number"]); ?>. <?php echo ($val["sqd_content"]); ?>
                        </p>
                        <div id="question1" style="display: none">
                            <div> <input type="radio"  name="answer"  value="A"/><a>&nbsp;A.&nbsp;</a><?php echo ($val["sqd_optiona"]); ?></div>
                            <div> <input type="radio"  name="answer" value="B"/><a>&nbsp;B.&nbsp;</a><?php echo ($val["sqd_optionb"]); ?></div>
                            <div> <input type="radio"  name="answer"  value="C"/><a>&nbsp;C.&nbsp;</a><?php echo ($val["sqd_optionc"]); ?></div>
                            <div> <input type="radio"  name="answer" value="D"/><a>&nbsp;D.&nbsp;</a><?php echo ($val["sqd_optiond"]); ?></div>
                        </div>
                        <p>
                            <div id="question2" style="display: none">
                                <div> <a>答案 </a><textarea type="text"  name="answer2"  value="<?php echo ($val["answer"]); ?>" rows="5" cols="30"><?php echo ($val["sgd_answer"]); ?></textarea></div>
                            </div>
                        </p>
                        <?php endforeach ?>
                        <p class="form-submit">
                            <input type="submit" class="btn btn-primary"    value="提交" id="ajaxSub" />
                        </p>

                        <!-- 分页 -->
                        <div class="row-fluid">
                            <div class="page"><?php echo ($page); ?></div>
                        </div>
                        <p class="form-submit">
                            <input type="submit" class="mu-send-msg-btn" style="display: none"  value="交卷" id="endExamSub" />
                        </p>
                    </form>
                </div>
            </div>

            </br>
            <button class="btn primary"><a href="<?php echo U('Home/Question/index');?>"><span class="label label-primary">返回试题一览</span></a></button>
            </br></br>

        </div>
    </div>
</div>


<!-- End Slider area -->

<!-- Start footer -->
<div class="mu-footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-footer-bottom-area">
                    <p class="mu-copy-right">&copy; Copyright liangxingfang. All right reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</footer>
<!-- End footer -->


<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/selftest/Public/js/bootstrap.min.js" ></script>
<!-- Slick slider -->
<script type="text/javascript" src="/selftest/Public/js/slick.min.js"></script>
<!-- Progress Bar -->
<script src="https://unpkg.com/circlebars@1.0.3/dist/circle.js"></script>
<!-- Filterable Gallery js -->
<script type="text/javascript" src="/selftest/Public/js/jquery.filterizr.min.js"></script>
<!-- Gallery Lightbox -->
<script type="text/javascript" src="/selftest/Public/js/jquery.magnific-popup.min.js"></script>
<!-- Counter js -->
<script type="text/javascript" src="/selftest/Public/js/counter.js"></script>
<!-- Ajax contact form  -->
<script type="text/javascript" src="/selftest/Public/js/app.js"></script>


<!-- Custom js -->
<script type="text/javascript" src="/selftest/Public/js/custom.js"></script>
<script type="text/javascript">
    $(function () {
        var select =  <?php echo ($val['sqd_kind_id']); ?>;
        var total = <?php echo ($total); ?>;
        var page = <?php echo ($pageNow); ?>;
        if(select =='10'){
            $("#question1").show();
            $("#question2").hide();
        }else{
            $("#question1").hide();
            $("#question2").show();
        }
        if(total == page){
            $("#endExamSub").show();
        }
    })
    var selectVal = "<?php echo ($val['sgd_answer']); ?>";
    $("input:radio[value="+selectVal+"]").attr('checked','true');
    $('#ajaxSub').click(function(){
        var data = $('form').serializeArray();
        console.log(data);
        $.ajax({
            type:'post',
            url:'<?php echo U('Home/Online/upToNext');?>',
            data:data,
            async:false,
            success:function (response) {
                if(response.code != '1'){
                    alert(response.msg);
                }else if(response.code == '1') {
                    alert(response.msg);
                }
            },
            error:function (response) {
                alert('考试异常！');

            }
        })
    })
    $('#endExamSub').click(function(){
        var data = $('form').serializeArray();
        console.log(data);
        $.ajax({
            type:'post',
            url:'<?php echo U('Home/Online/endExam');?>',
            data:data,
            async:false,
            success:function (response) {
                if(response.code != '1'){
                    alert(response.msg);
                }else if(response.code == '1') {
                    alert(response.msg);
                }
            },
            error:function (response) {
                alert('交卷异常！');

            }
        })
    })
</script>
</body>
</html>