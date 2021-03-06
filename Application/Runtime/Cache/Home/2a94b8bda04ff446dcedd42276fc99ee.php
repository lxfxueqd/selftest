<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>登录界面</title>
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
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Grade/index');?>">成绩列表</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Grade/index');?>">修改成绩</a>
                            <a class="dropdown-item" href="<?php echo U('Home/Grade/index');?>">生成成绩单</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="<?php echo U('Home/User/index');?>" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            个人中心
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo U('Home/Login/logout');?>">退出</a>
                        </div>
                    </li>
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
<div id="mu-slider">
    <div class="mu-slide">
        <!-- Start single slide  -->
        <div class="mu-single-slide">
            <img src="/selftest/Public/images/slider-img-1.jpg" alt="slider img">
            <div class="mu-single-slide-content-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-single-slide-content">
                                <h1>欢迎来到计算机通识课程在线自测平台</h1>
                                <p>用户可以通过平台进行计算机通识课程的在线练习与考试，包括考试管理，成绩管理，题库管理，在线自测，评卷管理和信息管理等。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End single slide  -->

        <!-- Start single slide  -->
        <div class="mu-single-slide">
            <img src="/selftest/Public/images/slider-img-2.jpg" alt="slider img">
            <div class="mu-single-slide-content-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-single-slide-content">
                                <h1>如果你是老师</h1>
                                <p>你可以在此平台实现试卷管理、评卷管理、成绩管理</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End single slide  -->

        <!-- Start single slide  -->
        <div class="mu-single-slide">
            <img src="/selftest/Public/images/slider-img-3.jpg" alt="slider img">
            <div class="mu-single-slide-content-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-single-slide-content">
                                <h1>如果你是学生</h1>
                                <p>你可以在此平台实现在线练习、考试及成绩查询</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End single slide  -->
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