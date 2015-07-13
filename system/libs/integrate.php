<?php
// +----------------------------------------------------------------------
// | Fanweo2o商业系统 最新版V3.03.3285  。
// +----------------------------------------------------------------------
// | 购买本程序，请联系旺旺名：zengchengshu
// +----------------------------------------------------------------------
// | 淘宝购买地址：http://cnlichuan.taobao.com
// +----------------------------------------------------------------------

//会员整合的接口
interface integrate{
	//用户登录
	/**
	 * 返回 array('status'=>'',data=>'',msg=>'') msg存放整合接口返回的字符串
	 * @param $user_data
	 */
	function login($user_name,$user_pwd);	
	
	//用户登出
	/**
	 * 返回 array('status'=>'',data=>'',msg=>'') msg存放整合接口返回的字符串
	 */
	function logout();
	
	//用户注册
	/**
	 * 返回 array('status'=>'',data=>'',msg=>'') msg存放整合接口的消息
	 * @param $user_data
	 */
	function add_user($user_name,$user_pwd,$email);
	
	//用户修改密码
	/**
	 * 返回bool
	 * @param $user_data
	 */
	function edit_user($user_data,$user_new_pwd);
	
	
	//删除会员
	function delete_user($user_data);
	
	
	//安装时执行的部份操作
	//返回 array('status'=>'','msg'=>'')
	function install($config_seralized);
	
	//卸载时执行的部份操作
	//无返回
	function uninstall();
}

?>