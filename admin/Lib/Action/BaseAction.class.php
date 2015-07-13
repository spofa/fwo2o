<?php
// +----------------------------------------------------------------------
// | Fanweo2o商业系统 最新版V3.03.3285  。
// +----------------------------------------------------------------------
// | 购买本程序，请联系旺旺名：zengchengshu
// +----------------------------------------------------------------------
// | 淘宝购买地址：http://cnlichuan.taobao.com
// +----------------------------------------------------------------------

class BaseAction extends Action{
	//后台基础类构造
	protected $lang_pack;
	public function __construct()
	{
		parent::__construct();
		
		global $mobile_cfg;
		if($mobile_cfg==null)
			$mobile_cfg = require_once APP_ROOT_PATH."system/mobile_cfg/".APP_TYPE."/webnav_cfg.php";
		
		check_install();
		//重新处理后台的语言加载机制，后台语言环境配置于后台config.php文件
		$langSet = conf('DEFAULT_LANG');			       	
		// 定义当前语言
		define('LANG_SET',strtolower($langSet));
		 // 读取项目公共语言包
		if (is_file(LANG_PATH.$langSet.'/common.php'))
		{
			L(include LANG_PATH.$langSet.'/common.php');
			$this->lang_pack = require LANG_PATH.$langSet.'/common.php';
			
			if(!file_exists(APP_ROOT_PATH."public/runtime/admin/lang.js"))
			{
				$str = "var LANG = {";
				foreach($this->lang_pack as $k=>$lang)
				{
					$str .= "\"".$k."\":\"".$lang."\",";
				}
				$str = substr($str,0,-1);
				$str .="};";
				file_put_contents(APP_ROOT_PATH."public/runtime/admin/lang.js",$str);
			}
		}
		es_session::close();

	}
	

	protected function error($message,$ajax = 0)
	{

		if(!$this->get("jumpUrl"))
		{
			if($_SERVER["HTTP_REFERER"]) $default_jump = $_SERVER["HTTP_REFERER"]; else $default_jump = u("Index/main");
			$this->assign("jumpUrl",$default_jump);
		}
		parent::error($message,$ajax);
	}
	protected function success($message,$ajax = 0)
	{

		if(!$this->get("jumpUrl"))
		{
			if($_SERVER["HTTP_REFERER"]) $default_jump = $_SERVER["HTTP_REFERER"]; else $default_jump = u("Index/main");
			$this->assign("jumpUrl",$default_jump);
		}
		parent::success($message,$ajax);
	}
}
?>