<?php
/**
 * Desc: index action for home page
 *
 * @author jason hu
 * @since 2015-3-20
 */
class IndexAction extends BaseAction{
	
	public function index(){
		header('Location: ./index.php?g=Home&m=Index&a=login');
	}
	
	function  login() {
		$this->display();
	}

	function  register() {
		$this->display();
	}
	
	
	function verify_code() {
		$input_code = strtolower(trim($_POST['vercode']));
		$session_code = strtolower(session('verify_code'));
		if (md5($input_code) == md5($session_code)) {
			echo  "true";
		}else{
			echo "false";
		}
	}
	
	function verify($num = 4, $w = 60, $h = 20) {
		$str = "23456789abcdefghijkmnpqrstuvwxyz";
		$code = '';
		for ($i = 0; $i < $num; $i++) {
			$code .= $str[mt_rand(0, strlen($str)-1)];
		}
		//将生成的验证码写入session，备验证页面使用
		session('verify_code', $code);
		//创建图片，定义颜色值
		Header("Content-type: image/PNG");
		$im = imagecreate($w, $h);
		$black = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
		$gray = imagecolorallocate($im, 118, 151, 199);
		$bgcolor = imagecolorallocate($im, 235, 236, 237);
	
		//画背景
		imagefilledrectangle($im, 0, 0, $w, $h, $bgcolor);
		//画边框
		imagerectangle($im, 0, 0, $w-1, $h-1, $gray);
		//imagefill($im, 0, 0, $bgcolor);
	
		//在画布上随机生成大量点，起干扰作用;
		for ($i = 0; $i < 80; $i++) {
			imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
		}
		//将字符随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
		$strx = rand(3, 8);
		for ($i = 0; $i < $num; $i++) {
			$strpos = rand(1, 6);
			imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
			$strx += rand(8, 14);
		}
		imagepng($im);
		imagedestroy($im);
	}
	
}