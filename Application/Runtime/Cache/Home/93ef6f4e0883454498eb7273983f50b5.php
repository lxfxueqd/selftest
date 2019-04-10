<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>题库</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="/selftest/Public/images/3.png"/>
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
                    <li class="nav-item dropdown active">
                        <a class="dropdown-toggle" href="<?php echo U('Home/Question/index');?>" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            题库
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Question/index');?>">题目列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Question/enterQuestion');?>">上传题目</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="<?php echo U('Home/Paper/index');?>" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            试卷管理
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Paper/index');?>">试卷列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Paper/paperCreate');?>">添加试卷</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Paper/index');?>">删除试卷</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="<?php echo U('Home/Exam/index');?>" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            考试安排
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Exam/index');?>">考试列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Exam/examCreate');?>">新增考试</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Exam/index');?>">删除考试</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="<?php echo U('Home/Grade/index');?>" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            成绩一览
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Grade/index');?>">成绩列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Grade/index');?>">修改成绩</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Grade/index');?>">生成成绩单</a>
                        </div>
                    </li>
                    <li class="nav-item "><a href="<?php echo U('Home/User/teaUser');?>">个人中心</a></li>
                    <?php endif; ?>
                    <?php if($_SESSION['user']['type'] == 1):?>
                    <li class="nav-item"><a href="<?php echo U('Home/Online/index');?>">在线考试</a></li>
                    <li class="nav-item"><a href="<?php echo U('Home/Test/index');?>">在线练习</a></li>
                    <li class="nav-item"><a href="<?php echo U('Home/Grade/index');?>">查看成绩</a></li>
                    <li class="nav-item"><a href="<?php echo U('Home/User/index');?>">个人中心</a></li>
                    <li class="nav-item "><a href="<?php echo U('Home/Login/logout');?>">退出</a></li>
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
                    <h1 class="mu-page-header-title">欢迎你，老师</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header area -->
<hr class="bs-docs-separator">

<div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>题目类型</th>
            <th>问题</th>
            <th>选项A</th>
            <th>选项B</th>
            <th>选项C</th>
            <th>选项D</th>
            <th>答案</th>
            <th>答案分析</th>
            <th>录入时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $val): ?>
            <tr>
                <td><?php echo ($val["sqd_question_id"]); ?></td>
                <td>
                    <?php echo ($val["sqd_kind_id"]); ?>
                </td>
                <td><?php echo ($val["sqd_content"]); ?></td>
                <td><?php echo ($val["sqd_optiona"]); ?></td>
                <td><?php echo ($val["sqd_optionb"]); ?></td>
                <td><?php echo ($val["sqd_optionc"]); ?></td>
                <td><?php echo ($val["sqd_optiond"]); ?></td>
                <td><?php echo ($val["sqd_answer"]); ?></td>
                <td><?php echo ($val["sqd_answer_analysis"]); ?></td>
                <td><?php echo ($val["sqd_create_time"]); ?></td>
                <td><?php echo C('status')[$val['sqd_status']];?></td>
                <td>
                    <div class="">
                        <?php if ($val['sqd_status'] == 0): ?>
                        <a href="javascript:;" class="blue tooltip-info no-hover-underline" data-rel="tooltip" data-original-title="重新启用" onclick="$.check('<?php echo U('Admin/Paper/allow', array('id'=>$val['id']));?>');">
                            <i class=""></i>
                            重新启用
                        </a>
                        <?php else: ?>
                        <a href="javascript:;" class="" data-rel="tooltip" data-original-title="禁用" onclick="$.check('<?php echo U('Admin/Paper/deny', array('id'=>$val['id']));?>');">
                            <i class=""></i>
                            禁用
                        </a>
                        <?php endif ?>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!-- 分页 -->
    <div class="row-fluid">
        <div class="page"><?php echo ($page); ?></div>
    </div>
</div>
<button class="btn primary"><a href="<?php echo U('Home/Question/enterQuestion');?>"><span class="label label-primary">录入试题</span></a></button>
</br></br></br>
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
<script src="/selftest/Public/js/jquery-2.0.3.min.js"></script>
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

</body>
</html>