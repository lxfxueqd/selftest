<?php

	//'配置项'=>'配置值'

/**
 * 后台专属的一些配置文件
 */
		return array(
		
			'SHOW_PAGE_TRACE' 		=>	true,				//开启页面trace
		
//			'TMPL_PARSE_STRING'  =>array(
//				'__STYLE__' => '/Public/',  #/zp/
//				'__UPLOAD__' => '/Uploads',        #/zp/
//			),
			
			'user_type' => array(
				1 => '学生',
				2 => '教师',
			),

            'admin_type' => array(
                1 => '一级管理员',
                2 => '二级管理员',
                3 => '三级管理员',
                4 => '超级管理员',
            ),
		
			'user_state' => array(
				-1 => '禁用',
				0 => '未激活',
				1 => '正常',
			),
			
			'designer_state' => array(
			    0 => '待审核',
			    1 => '审核通过',
			    2 => '已拒绝',
			),
		);
?>