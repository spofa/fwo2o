<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(97139915@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.FOLDER_NAME.'/Lib/core/MainBaseModule.class.php';
require APP_ROOT_PATH.FOLDER_NAME.'/Lib/core/api_init.php';
define("CTL",'ctl');
define("ACT",'act');

class MainApp{		
	private $module_obj;
	//网站项目构造
	public function __construct(){
		
		$module = strtolower($GLOBALS['request'][CTL]?$GLOBALS['request'][CTL]:"index");
		$action = strtolower($GLOBALS['request'][ACT]?$GLOBALS['request'][ACT]:"index");
		
		$module = filter_ctl_act_req($module);
		$action = filter_ctl_act_req($action);
		
		if(!file_exists(APP_ROOT_PATH.FOLDER_NAME."/Lib/".$module."Module.class.php"))
		$module = "index";
		
		require_once APP_ROOT_PATH.FOLDER_NAME."/Lib/".$module."Module.class.php";				
		if(!class_exists($module."Module"))
		{
			$module = "index";
			require_once APP_ROOT_PATH.FOLDER_NAME."/Lib/".$module."Module.class.php";	
		}
		if(!method_exists($module."Module",$action))
		$action = "index";
		
		define("MODULE_NAME",$module);
		define("ACTION_NAME",$action);
		
		$module_name = $module."Module";
		$this->module_obj = new $module_name;
		$this->module_obj->$action();
	}
	
	public function __destruct()
	{
		unset($this);
	}
}
?>