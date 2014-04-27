<?php
//执行用户登录：
	session_start();
	
//获取登陆信息；
	$username=$_POST['username'];//账号
	$userpass=$_POST['password'];//密码
	
//导入数据库配置文件	
	require("../public/dbconfig.php");
	
//连接数据库，并判断是否成功：
	$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败!原因是：".mysql_error());
	
//设置字符集编码,选择数据库：
	mysql_select_db(DBNAME,$link);
	mysql_set_charset('utf8');
	
//准备sql语句，并执行：	
	$sql="select * from users where username='{$username}' and pass='{$userpass} '";
	$result=mysql_query($sql,$link);
	$user=mysql_fetch_assoc($result);
//解析结果集：	
	if( mysql_num_rows($result)>0 & $user['state']==1 || $user['state']==2 ){//判断账号密码已经权限信息
	//成功则放入session：
		$_SESSION['adminuser']=$user;
			header("Location:index.php?p=1");
		}else{
			header("Location:index.php?p=2");
		}
		
//释放结果集，关闭连接
	mysql_free_result($result);
	mysql_close($link);
	
	
	
?>