<?php

//执行用户登录操作：
session_start();
//获取登陆信息
$username=$_POST['username'];//账号
$userpass=$_POST['userpass'];//密码	
$usercode=$_POST['usercode'];//
$code=$_SESSION['code'];

//验证是否后台有效账户
if($username!="admin"){
	header("Location:login.php?eno=1");
	exit();
}
//判断验证码
if($usercode!=$code){  
	header("Location:login.php?eno=2");
	exit();
	}


//执行用户信息的数据库信息登陆验证操作
//1导入数据库配置文件
require('../public/dbconfig.php');

//2连接数据库并判断正误
$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());
//设置字符集，选择数据库
mysql_select_db(DBNAME,$link);
mysql_set_charset('utf8');

//3准备sql语句并执行
$sql="select * from users where username='{$username}' and pass='".md5($userpass)."'";
$result=mysql_query($sql,$link);

//4解析
if($result && mysql_num_rows($result)>0){
	//登录成功
	$user=mysql_fetch_assoc($result);//登录信息
	$_SESSION['user']=$user;//将登录信息放入到session中
	header("Location:index.php");
	}else{
	//登录失败
	header("Location:login.php?eno=3");
	exit();
	}
//5释放，关闭

mysql_free_result($result);
mysql_close($link);


?>