<?php
// +----------------------------------------------------------------------
// | Fanweo2o商业系统 最新版V3.03.3285  。
// +----------------------------------------------------------------------
// | 购买本程序，请联系旺旺名：zengchengshu
// +----------------------------------------------------------------------
// | 淘宝购买地址：http://cnlichuan.taobao.com
// +----------------------------------------------------------------------

//快递单打印接口
interface express {
	/**
	 * 打印快递单的接口
	 * @param $order_id 订单号
	 * @param $express_sn 快递单号
	 * return html 关于本快递的打印HTML
	 */
	function get_express_form($order_id,$express_sn);

	
}
?>