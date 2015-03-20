<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>微信管家 用户登录</title>
<meta name="keywords" content="微管家、微信营销、微信代运营、微信托管、微网站、微商城、微营销、微信定制开发">
<meta name="description"
	content="微信管家,国内最大的微信公众智能服务平台,管家十大微体系:微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计、微支付、微客服,企业微营销必备。">
<meta name="apple-mobile-web-app-status-bar-style"
	content="black-translucent">
<link rel="stylesheet" href="<?php echo RES;?>/css/style.css">
</head>
<body>
<div class="g logoBox" style="width: 1200px;">
<div class="logo l"><a href="/"><img	src="<?php echo RES;?>/images/logo_big.png" " alt="微信管家" width="250"
	height="84"></a></div>
</div>
<hr style="color: #f8f8f8; margin: 1px;">
<div class="g focusBox">
<div class="focus"><img src="<?php echo RES;?>/images/focus.png" alt="功能">
</div>
<div class="loginBox png24">
<h1><span class="r">没账号？<a href="/reg.html">立即注册</a></span>登录</h1>
<form action="/" method="post">
<ul>
	<li><!--							<input type="text"   value="" name="fT08d9e827ffbba2efe4413cb064bbf847un" id="fun" tabindex="1" class="ipt tipinput1" placeholder="微信管家账号" autocomplete="off" maxlength="100" suggestwidth="340px"/>										-->

	<input type="text" value="" name="fT08d9e827ffbba2efe4413cb064bbf847un"
		id="fun" tabindex="1" class="ipt tipinput1" placeholder="微信管家账号"
		autocomplete="off" maxlength="100" suggestwidth="340px" /></li>
	<li class="l2"><input type="password" value=""
		name="fT08d9e827ffbba2efe4413cb064bbf847pwd" id="fpwd" tabindex="2"
		class="ipt tipinput1" placeholder="请输入您的密码" maxlength="20"
		autocomplete="off" /></li>
	<li class="l3"><span class="l"><input id="hold"
		type="checkbox" checked="" value="1" name="remme"
		style="outline: none; vertical-align: middle">&nbsp;自动登录</span><span
		class="r"> <a href="http://www.weixinguanjia.cn/findpwd2.html">忘记密码？</a>
	</span></li>
	<li class="l4"><input type="submit" tabindex="4" id="btn-login"
		value=""></li>
	<li class="l5">使用以下帐号登录</li>
	<li class="l6"><a
		href="https://graph.qq.com/oauth2.0/authorize?response_type=code&amp;scope=get_user_info,add_t,add_idol,del_t,add_share&amp;client_id=100543439&amp;redirect_uri=http://www.weixinguanjia.cn&amp;state=qqreg"
		class="l"><img src="<?php echo RES;?>/images/bt_blue.png"
		style="vertical-align: top; width: 140px; height: 40px;"></a></li>
</ul>
</form>
</div>
</div>
<div class="g cpr hc">Copyright©2012-2015 掌中宝 All Rights Reserved.
</div>
<!--[if IE]>
		<script src="wzc/js/DD_belatedPNG.js"></script>
		<script>
			DD_belatedPNG.fix('.png24');
		</script>
	<![endif]-->
<div style="width: 0px; height: 0px; overflow: hidden;"><script
	src="http://s22.cnzz.com/z_stat.php?id=1000151448&web_id=1000151448"
	language="JavaScript"></script></div>
</body>
</html>