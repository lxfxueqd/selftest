<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>后台管理平台登陆界面 - 计算机通识课程在线自测平台</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="/selftest/Public/Adminstyle/css/bootstrap.min.css" rel="stylesheet" />
		<link href="/selftest/Public/Adminstyle/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/style.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/selftest/Public/Adminstyle/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--page specific plugin styles-->
		<!--fonts-->
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-fonts.css" />
		<!--ace styles-->
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace.min.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-skins.min.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-ie.min.css" />
		<![endif]-->
		<script type="text/javascript" src="/selftest/Public/Adminstyle/js/jquery-2.0.3.min.js" ></script>
	</head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i class="icon-leaf green"></i>
										<span class="red">运营管理平台</span>
										<span class="white">登陆界面</span>
									</h1>
									<h4 class="blue">&copy; 计算机通识课程在线自测平台</h4>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border st-login-box">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													请输入您的信息
												</h4>

												<div class="space-6"></div>

												<form id="loginForm" method="post" >
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" id="username" name="username" placeholder="用户名" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" id="password" name="password" placeholder="密码" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" id="code" name="code" placeholder="验证码" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<img class="img_change" src="<?php echo U('Login/verify');?>"  width="150" height="100">
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
														   <label class="inline">
																<input type="checkbox" class="ace" />
																<span class="lbl"> 记住我</span>
															</label>

															<button id="subb" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-key"></i>
																登陆
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>
											</div><!--/widget-main-->
											<div class="toolbar clearfix">&nbsp;</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<!--[if !IE]>-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/selftest/Public/Adminstyle/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!--<![endif]-->
		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/selftest/Public/Adminstyle/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			jQuery(function($) {
				$.extend({

					changeVerify : function()
					{
						var url = $('.img_change').attr('src');
						if (url.indexOf('?') > 0) {
							url = url.substr(0, url.indexOf('?'));
						}
						url = url + '?' + parseInt(Math.random()*10000);
						$('.img_change').attr('src', url);
					}

                }),
					$('.img_change').click(function() {
                        $.changeVerify();
                    })
			})

            //
$('#subb').click(function(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var code = document.getElementById("code").value;
    $.ajax({
        type : 'post',
        url : '<?php echo U('Login/doLogin');?>',
        data : {username:username,password:password,code:code},
        async : false,
        success : function(response)
        {
            $.changeVerify();
            if(response.code != '1'){
                alert(response.msg);
            }else if(response.code = '1') {
                window.location.href=response.url;
            }
        },
        error: function () {
            alert("登录异常");
        }


})



                return false;
			if(ep){
				$('#loginForm').submit();
			}else{
				$.changeVerify();
				return false;
			}

});

		</script>
	</body>
</html>