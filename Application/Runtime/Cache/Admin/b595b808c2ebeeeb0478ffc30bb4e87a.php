<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>后台管理平台 - VR/AR素材网</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- 必须的css -->
		<link href="/selftest/Public/Adminstyle/css/bootstrap.min.css" rel="stylesheet" />
		<link href="/selftest/Public/Adminstyle/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/selftest/Public/Adminstyle/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-fonts.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/jquery-ui-1.10.3.full.min.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace.min.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-skins.min.css" />
		<link rel="stylesheet" href="/selftest/Public/Adminstyle/css/sucai.admin.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/selftest/Public/Adminstyle/css/ace-ie.min.css" />
		<![endif]-->
        <link rel="stylesheet" href="/selftest/Public/Adminstyle/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="/selftest/Public/Adminstyle/css/datepicker.css" />
        <link rel="stylesheet" href="/selftest/Public/Adminstyle/css/sucai.global.css" />
		<!-- /必须的css -->
		
		
		<script src="/selftest/Public/Adminstyle/js/ace-extra.min.js"></script>
	</head>

	<body>
		<!-- 头部 -->
		<div class="navbar" id="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a href="#" class="brand">
				<small>
					<i class="icon-comments"></i>
					计算机通识课程在线自测平台 - 后台管理平台
				</small>
			</a><!--/.brand-->

			<ul class="nav ace-nav pull-right">

				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					   <!-- <img class="nav-user-photo"  alt="<?php echo session('admin.username');?>" />-->
						<span class="user-info">
							<small>欢迎回来</small>
							<?php echo session('admin.username');?>
						</span>

						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
						<!-- <li>
							<a href="#">
								<i class="icon-cog"></i>
								修改信息
							</a>
						</li> -->

						<li>
							<a href="javascript:;" onclick="$.sucai.formShow('<?php echo U('admin/user/editPwd');?>');">
								<i class="icon-lock"></i>
								修改密码
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo U('Login/logout');?>">
								<i class="icon-off"></i>
								退出
							</a>
						</li>
					</ul>
				</li>
			</ul><!--/.ace-nav-->
		</div><!--/.container-fluid-->
	</div><!--/.navbar-inner-->
</div>
		<!-- /头部 -->

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<!-- 左侧菜单 -->
			
	<div class="sidebar" id="sidebar">
	<ul class="nav nav-list">
		<li <?php if(index == 'index'): ?>class="active open"<?php endif; ?>>
			<a href="<?php echo U('admin/index/index');?>">
				<i class="icon-home"></i>
				<span class="menu-text"> 控制台 </span>
			</a>
		</li>

		<li <?php if(index == 'user'): ?>class="active open"<?php endif; ?>>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-group"></i>
				<span class="menu-text">用户管理</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
				<a href=<?php echo U('Admin/Admin/index');?>>
						<i class="icon-double-angle-right"></i>
						管理员列表
					</a>
				</li>
				<li>
					<a href=<?php echo U('Admin/Student/index');?>>
						<i class="icon-double-angle-right"></i>
						学生列表
					</a>
				</li>
				<li>
					<a href=<?php echo U('Admin/Teacher/index');?>>
						<i class="icon-double-angle-right"></i>
						教师列表
					</a>
				</li>
			</ul>
		</li>

		<li <?php if(index == 'company'): ?>class="active open"<?php endif; ?>>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-envelope-alt"></i>
				<span class="menu-text">试卷管理</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li <?php if([ac] == 'xxx'): ?>class="active open"<?php endif; ?>>
					<a href="<?php echo U('Admin/Paper/index');?>">
						<i class="icon-double-angle-right"></i>
						试卷信息列表
					</a>
				</li>
			</ul>
		</li>

		<li <?php if(index == 'Category'): ?>class="active open"<?php endif; ?>>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-film"></i>
				<span class="menu-text">考试管理</span>
				<b class="arrow icon-angle-down"></b>
			</a>
		<ul class="submenu">
			<li <?php if([ac] == 'xxx'): ?>class="active open"<?php endif; ?>>
			<a href="<?php echo U('Admin/Exam/index');?>">
				<i class="icon-double-angle-right"></i>
				考试信息列表
			</a>
			</li>
		</ul>
		</li>

		<li <?php if(index == 'Category'): ?>class="active open"<?php endif; ?>>
		<a href="javascript:;" class="dropdown-toggle">
			<i class="icon-film"></i>
			<span class="menu-text">自测管理</span>
			<b class="arrow icon-angle-down"></b>
		</a>
		<ul class="submenu">
			<li <?php if([ac] == 'xxx'): ?>class="active open"<?php endif; ?>>
			<a href="<?php echo U('Admin/Test/index');?>">
				<i class="icon-double-angle-right"></i>
				自测信息列表
			</a>
			</li>
		</ul>
		</li>

		<li <?php if(index == 'link'): ?>class="active open"<?php endif; ?>>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-heart"></i>
				<span class="menu-text">成绩管理</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li <?php if([ac] == 'index'): ?>class="active open"<?php endif; ?>>
					<a href="<?php echo U('Admin/Grade/index');?>">
						<i class="icon-double-angle-right"></i>
						考试成绩信息列表
					</a>
				</li>
			</ul>
		</li>

		<li <?php if(index == 'manager'): ?>class="active open"<?php endif; ?>>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-legal"></i>
				<span class="menu-text">学院科目信息管理</span>
				<b class="arrow icon-angle-down"></b>
			</a>
		<ul class="submenu">
			<li <?php if([ac] == 'xxx'): ?>class="active open"<?php endif; ?>>
			<a href="<?php echo U('Admin/Category/index');?>">
				<i class="icon-double-angle-right"></i>
				全部分类列表
			</a>
			</li>
		</ul>
		</li>
		
		<li <?php if(index == 'manager'): ?>class="active open"<?php endif; ?>>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-legal"></i>
				<span class="menu-text">系统管理</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
				<a href=<?php echo U('Admin/News/index');?>>
						<i class="icon-double-angle-right"></i>
						公告列表
					</a>
				</li>
			</ul>
		</li>
		

	</ul>

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>

			<!-- /左侧菜单 -->

			<div class="main-content">
				<!-- 面包屑导航 -->
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="<?php echo U('index/index');?>">首页</a>
							<span class="divider">
							<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						
<li class="active">控制台</li>

					</ul>
				</div>
				<!-- /面包屑导航 -->

				<div class="page-content">
					
<div class="row-fluid">
	<div class="span12">
		<div class="alert alert-block alert-success">
			<button data-dismiss="alert" class="close" type="button">
				<i class="icon-remove"></i>
			</button>
			<i class="icon-ok green"></i>
			欢迎来到
			<strong class="green">
				计算机通识课程在线自测平台 - 后台管理平台
				<small>(v1.0)</small>
			</strong>
			, 专业的在线自测平台
		</div>
		<div class="space-6"></div>
		<div class="row-fluid">
			<div class="span7 infobox-container">



				<div class="infobox infobox-blue">
					<div class="infobox-icon">
						<i class="icon-bar-chart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php echo ($data["model_total"]); ?></span>
						<div class="infobox-content">试卷数</div>
					</div>
					
				</div>

				<div class="infobox infobox-pink">
					<div class="infobox-icon">
						<i class="icon-bar-chart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php echo ($data["link_total"]); ?></span>
						<div class="infobox-content">友情链接数</div>
					</div>
					
				</div>

				<div class="infobox infobox-red">
					<div class="infobox-icon">
						<i class="icon-bar-chart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php echo ($data["user_incheck"]); ?></span>
						<div class="infobox-content">已验证用户数</div>
					</div>
					
				</div>

				<div class="infobox infobox-orange2">
					<div class="infobox-icon">
						<i class="icon-bar-chart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php echo ($data["user_uncheck"]); ?></span>
						<div class="infobox-content">未验证用户数</div>
					</div>
					
				</div>

				<div class="infobox infobox-blue2">
					<div class="infobox-icon">
						<i class="icon-bar-chart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php echo ($data["designer_incheck"]); ?></span>
						<div class="infobox-content">待审核教师数</div>
					</div>
					
				</div>

				<div class="infobox infobox-green">
					<div class="infobox-icon">
						<i class="icon-bar-chart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php echo ($data["designer_uncheck"]); ?></span>
						<div class="infobox-content">教师数</div>
					</div>
					
				</div>
			</div>
			<div class="vspace"></div>
			<div class="span5">
				<div class="widget-box">
					<div class="widget-header widget-header-flat widget-header-small">
						<h5><i class="icon-signal"></i>全部用户</h5>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div id="piechart-placeholder"></div>
							<div class="hr hr8 hr-double"></div>
							<div class="clearfix">
								<div style="width:45%;float:left;">
									<span class="grey">
										<i class="icon-group icon-2x blue"></i>
										&nbsp; 学生
									</span>
									<h4 class="bigger pull-right"><?php echo ($data["user_total"]); ?></h4>
								</div>
								<div style="width:45%;float:right;">
									<span class="grey">
										<i class="icon-group icon-2x red"></i>
										&nbsp; 教师
									</span>
									<h4 class="bigger pull-right"><?php echo ($data["designer_total"]); ?></h4>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hr hr32 hr-dotted"></div>
		<!--<!--<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="lighter smaller">
							<i class="icon-calendar blue"></i>
							操作日志
						</h4>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<div class="dialogs">

								<div class="itemdiv dialogdiv">
									<div class="user">
										<!--<img alt="Alexa's Avatar" src="" />
										<?php echo $_SESSION['admin']['username'] ?>
									</div>
									<div class="body">
										<div class="time">
											<i class="icon-time"></i>
											<span class="green"><?php echo date("Y-m-d h:i:s");?></span>
										</div>

										<div class="name">
											<a href="#"><?php echo $_SESSION['admin']['username'] ?></a>
										</div>
										<div class="text">审核了 xxx 设计师</div>

										<div class="tools">
											<a href="#" class="btn btn-minier btn-info">
												<i class="icon-only icon-share-alt"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>				

			</div>
		</div>-->
	</div>
</div>

				</div><!--/.page-content-->

				<!-- 右侧悬浮的设置按钮,去掉好像会引起js报错 -->
				<div class="ace-settings-container hide" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div>
				<!-- /右侧悬浮的设置按钮,去掉好像会引起js报错 -->
			</div>
		</div>

		<!-- 回到顶部 -->
		<a href="###" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
		<!-- /回到顶部 -->

		<!-- 操作后提示框 -->
		<div id="sc-alert" class="hide" style="margin-bottom:-1.5em;"></div>
		<!--modal表单弹出框-->
		<form id="sc-form" class="modal fade hide form-horizontal" method="post" tabindex="-1" enctype="multipart/form-data" onsubmit="return false;"></form>

		<!-- 基础js部分 -->
		<script src='/selftest/Public/Adminstyle/js/jquery-1.10.2.min.js'></script>
		<script src='/selftest/Public/Adminstyle/js/jquery.mobile.custom.min.js'></script>
		
		<script src="/selftest/Public/Adminstyle/js/jquery-ui-1.10.3.full.min.js"></script>
		<script src="/selftest/Public/Adminstyle/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/selftest/Public/Adminstyle/js/bootstrap.min.js"></script>
		<script src="/selftest/Public/Adminstyle/js/ace-elements.min.js"></script>
		<script src="/selftest/Public/Adminstyle/js/ace.min.js"></script>
		
		<script src="/selftest/Public/Adminstyle/js/jquery.dataTables.min.js"></script>
		<script src="/selftest/Public/Adminstyle/js/jquery.dataTables.bootstrap.js"></script>
		<script src="/selftest/Public/Adminstyle/js/jquery.inputlimiter.1.3.1.min.js"></script>

		<!-- /基础js部分 -->
		<script type="text/javascript">
		jQuery(function($){
			try{
				ace.settings.navbar_fixed(true);
				ace.settings.sidebar_fixed(true);
				ace.settings.breadcrumbs_fixed(true);
			}catch(e){}
			
			$('[data-rel=tooltip]').tooltip();
			$('[data-rel=popover]').popover({html:true});

		});	
		</script>
		

		
		
<script src="/selftest/Public/Adminstyle/js/jquery.easy-pie-chart.min.js"></script>
<script src="/selftest/Public/Adminstyle/js/jquery.slimscroll.min.js"></script>
<script src="/selftest/Public/Adminstyle/js/jquery.sparkline.min.js"></script>
<script src="/selftest/Public/Adminstyle/js/flot/jquery.flot.min.js"></script>
<script src="/selftest/Public/Adminstyle/js/flot/jquery.flot.pie.min.js"></script>
<script src="/selftest/Public/Adminstyle/js/flot/jquery.flot.resize.min.js"></script>

<script type="text/javascript">
	jQuery(function($){

		$('.dialogs,.comments').slimScroll({
			height: '300px'
	    });

		/* 统计饼图 */
		var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
		var data = [
			{ label: "学生",  data: <?php echo ($data["user_bite"]); ?>, color: "#2091CF"},
			{ label: "教师",  data: <?php echo ($data["designer_bite"]); ?>, color: "#DE5A42"}
		]
		function drawPieChart(placeholder, data, position) {
			$.plot(placeholder, data, {
			series: {
				pie: {
					show: true,
					tilt:0.8,
					highlight: {
						opacity: 0.25
					},
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2
				}
			},
			legend: {
				show: true,
				position: position || "ne", 
				labelBoxBorderColor: null,
				margin:[-30,15]
			}
			,
			grid: {
				hoverable: true,
				clickable: true
			}
		 })
		}
		drawPieChart(placeholder, data);

		/**
		we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
		so that's not needed actually.
		*/
		placeholder.data('chart', data);
		placeholder.data('draw', drawPieChart);
		var $tooltip = $("<div class='tooltip top in hide'><div class='tooltip-inner'></div></div>").appendTo('body');
		var previousPoint = null;
		placeholder.on('plothover', function (event, pos, item) {
		if(item) {
			if (previousPoint != item.seriesIndex) {
				previousPoint = item.seriesIndex;
				var tip = item.series['label'] + " : " + item.series['percent']+'%';
				$tooltip.show().children(0).text(tip);
			}
			$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
		} else {
			$tooltip.hide();
			previousPoint = null;
		}
		});
		/* /统计饼图 */



	});



</script>

	</body>
</html>