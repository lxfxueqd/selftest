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
                    <li class="nav-item"><a href="<?php echo U('Home/Index/login');?>">登录</a></li>
                    <li class="nav-item active"><a href="<?php echo U('Home/Index/register');?>">注册</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- End Header -->


<!-- Start main content -->
<main>
    <!-- Start Contact -->
    <section id="mu-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-contact-area">
                        <!-- Title -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mu-title">
                                    <h2>登录</h2>
                                </div>
                            </div>
                        </div>
                        <!-- Start Contact Content -->
                        <div class="mu-contact-content">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mu-contact-form-area">
                                        <div id="form-messages"></div>
                                        <form id="ajax-contact" method="post" onsubmit="return false" class="mu-contact-form">

                                            <div class="form-group">
                                                <span class="fa fa-user mu-contact-icon"></span>
                                                <input type="text" class="form-control" placeholder="输入用户名" id="name" name="username" required>
                                            </div>

                                            <div class="form-group">
                                                <span class="fa fa-envelope mu-contact-icon"></span>
                                                <input type="password" class="form-control" placeholder="输入密码" id="password" name="password" required>
                                            </div>

                                            <div class="form-group">

                                                <input type="radio" value="2" name="usertype" /><label>老师</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="1" name="usertype" /><label>学生</label>


                                            </div>
                                            <button type="submit" id="loginSub" class="mu-send-msg-btn"><span>登录</span></button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Contact Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->
</main>
<!-- End main content -->

<!-- Start footer -->
<div class="mu-footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-footer-bottom-area">
                    <p class="mu-copy-right">&copy; Copyright liangxingfang. All right reserved. </p>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
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
<script type="text/javascript">
    jQuery(
        $('#loginSub').click(function(){
            var data = $('form').serializeArray();
            console.log(data);
            $.ajax({
                type:'post',
                url:'<?php echo U('Login/dologin');?>',
                data:data,
                async:false,
                success:function (response) {
                    if(response.code != '1'){
                        alert(response.msg);
                    }else if(response.code == '1') {
                        alert(response.msg);
                        window.location.href=response.url;
                    }
                },
                error:function (response) {
                    alert('登录异常！');

                }
            })
        })
    )
</script>
</html>