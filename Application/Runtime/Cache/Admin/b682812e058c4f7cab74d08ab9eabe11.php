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
	<h3 class="header blue lighter smaller">
		<form action="<?php echo U('Admin/Admin/index');?>" method="get">
		<div class="row-fluid  dataTables_wrapper">
			<div class="span4">
				&nbsp;
			</div>
			<div class="span8" id="m_search_div">
				<button type="submit" class="btn btn-primary btn-small pull-right" id="search_submit"><i class="icon-ok bigger-110"></i>搜索</button>
				<input name="username" value="<?php echo ($map["sai_username"]); ?>" type="text" id="search_username" class="pull-right" placeholder="用户名"/>
				<label class="control-label pull-right">管理员名称：</label>
			</div>	
		</div>
		</form>
	</h3>
	<div class="table-header">管理员列表</div>
	<div class="dataTables_wrapper" role="grid">
		<table id="user_table" class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
			<thead>
				<tr>
					<th class="center">
						<label>
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</th>
					<th>id</th>
					<th>用户名</th>
					<th>类型</th>
					<th>创建时间</th>
					<th class="hidden-phone">
						<i class="icon-time bigger-110 hidden-phone"></i>
						最后登录时间
					</th>
					<th>最后登录IP</th>
					<th class="hidden-480">状态</th>
					<th class="hidden-480">操作</th>
				</tr>
			</thead>

			<tbody>
				<?php if(is_array($data)): foreach($data as $key=>$value): ?><tr>
						<td class="center">
							<label>
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>
						<td><?php echo ($value["sai_admin_id"]); ?></td>
						<td><?php echo ($value["sai_username"]); ?></td>
						<td class="hidden-480">
							<?php echo C('admin_type')[$value[sai_type]];?>
						</td>
						<td><?php echo (date("Y-m-d H:i",$value["sai_create_time"])); ?></td>
						<td class="hidden-phone"><?php echo (date("Y-m-d H:i",$value["sai_login_time"])); ?></td>
						<td class="hidden-phone"><?php echo ($value["sai_login_ip"]); ?></td>
						<td class="hidden-480">
							<?php echo C('user_state')[$value[sai_status]];?>
						</td>
						<td>
							<div class="hidden-phone visible-desktop action-buttons">
								<a href="javascript:;" onclick="$.sucai.formShow('<?php echo U('Admin/Admin/edit', array('sai_admin_id'=>$value['id']));?>');" class="green" data-rel="tooltip" data-original-title="编辑信息">
									<i class="icon-pencil bigger-130"></i>
								</a>

								<a href="javascript:;" onclick="$.del('<?php echo U('Admin/Admin/deny', array('sai_admin_id'=>$value['id']));?>');" class="red" data-rel="tooltip" data-original-title="禁用用户">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
		<!-- 分页 -->
		<div class="row-fluid">
			<div class="page"><?php echo ($page); ?></div>
		</div>
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
		

		
		
<script type="text/javascript">
		jQuery(function($) {

			// 这就是全选按钮
			$('table th input:checkbox').on('click' , function(){
				var that = this;
				$(this).closest('table').find('tr > td:first-child input:checkbox')
				.each(function(){
					this.checked = that.checked;
					$(this).closest('tr').toggleClass('selected');
				});	
			});

			$.extend({

				action : function(url, obj)
				{
					var obj = $(obj).parents('form');

					$.ajax({
						url : url,
						type : 'post',
						data : obj.serialize(),
						success : function(res)
						{
							$.sucai.alert(res.msg, res.code, 2);
							$.sucai.formHide();
							location.reload();
						}
					});
				},

				del : function(url)
				{
					$.ajax({
						url : url,
						type : 'get',
						success : function(res)
						{
							$.sucai.alert(res.msg, res.code, 2);
							location.reload();
						}
					});
				}
			});
		
		})
	</script>

	</body>
</html>