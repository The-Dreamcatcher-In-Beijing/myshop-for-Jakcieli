<?php
//GD的绘画(验证码的绘制)
session_start();//启用session会话
$length=4; //验证码位数长度
$code = getCode($length,1); //获取随机的验证码值
$_SESSION['code']=$code;//将获取的code放到session中
$width = 20*$length;
$height= 30;

//1. 创建画布，准备颜色（画笔）
$im = imagecreatetruecolor($width,$height); //创建一个画布
//定义背景颜色
$bg[] = imagecolorallocate($im,236,237,220); //分配一个颜色
$bg[] = imagecolorallocate($im,244,220,219); //分配一个颜色
$bg[] = imagecolorallocate($im,163,225,151); //分配一个颜色
$bg[] = imagecolorallocate($im,217,220,213); //分配一个颜色
//定义绘制颜色
$c[] = imagecolorallocate($im,0,0,250); //分配一个颜色
$c[] = imagecolorallocate($im,250,0,0); //分配一个颜色
$c[] = imagecolorallocate($im,32,139,16); //分配一个颜色
$c[] = imagecolorallocate($im,39,104,116); //分配一个颜色
$c[] = imagecolorallocate($im,116,35,120); //分配一个颜色

//2. 开始绘画
imagefill($im,0,0,$bg[rand(0,3)]); //填充背景颜色


//使用字体文件绘制字串
for($i=0;$i<$length;$i++){
 imagettftext($im,15,rand(-45,45),5+$i*20,25,$c[rand(0,4)],"./MSYHBD.TTF",$code[$i]);
}

//添加干扰点和线
for($i=0;$i<100;$i++){
	$color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)); //分配一个随机颜色
	imagesetpixel($im,rand(0,$width),rand(0,$height),$color);
}
for($i=0;$i<5;$i++){
	$color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)); //分配一个随机颜色
	imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$color);
}

//3. 输出图片
header("Content-Type: image/jpeg");
imagejpeg($im);

//4. 销毁资源
imagedestroy($im);






//获取验证码字串函数
function getCode($m=4,$type=1){
	$str = "0123456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//获取要随机字串长度
	switch($type){
		case 1:  $length=9; break;//纯数字，
		case 2:  $length=33; break;//数字+小写字母，
		default: $length=strlen($str)-1; //数字+大小写字母（所有）
	}
	
	//循环随机获取字符
	$s="";
	for($i=0;$i<$m;$i++){
		$k = rand(0,$length); //随机一个有效字符下标
		$s.=$str[$k]; //获取对应的字符
	}
	//返回结果
	return $s;
}