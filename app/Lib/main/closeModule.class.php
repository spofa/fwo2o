<?php
// +----------------------------------------------------------------------
// | Fanweo2o商业系统 最新版V3.03.3285  。
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | 淘宝购买地址：http://cnlichuan.taobao.com
// +----------------------------------------------------------------------

class closeModule extends MainBaseModule
{
	public function index()
	{		
		if(app_conf("SHOP_OPEN")==1)  //网站关闭时跳转到站点关闭页
		{
			app_redirect(url("index"));
		}
		//开始输出site_seo
		$site_seo['keyword']	=	app_conf('SHOP_KEYWORD');
		$site_seo['description']	= app_conf('SHOP_DESCRIPTION');
		$site_seo['title']  = app_conf("SHOP_TITLE");
		$seo_title =	app_conf('SHOP_SEO_TITLE');
		if($seo_title!="")$site_seo['title'].=" - ".$seo_title;
		$GLOBALS['tmpl']->assign("site_seo",$site_seo);
		
		$GLOBALS['tmpl']->assign("content",app_conf("SHOP_CLOSE_HTML"));
		$GLOBALS['tmpl']->display("close.html");
	}
	
	
}
?>