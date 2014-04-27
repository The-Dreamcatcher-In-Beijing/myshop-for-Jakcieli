<?php
	$username=$_POST['sname'];
	$name=$_POST['lname'];
	$pass=$_POST['pass'];
	$sex=$_POST['gen'];
	$email=$_POST['email'];
	$addtime=time();
	$phone=$_POST['phone'];
	$code=$_POST['code'];
	$address=$_POST['address'];

//设置配置文件：	
	require('../public/dbconfig.php');

//连接数据库，并判断是否成功：
	$link=mysql_connect(HOST,USER,PASS) or die("连接数据库失败!原因是：".mysql_error());
	
//设置字符集编码，选择数据库：
	mysql_select_db(DBNAME,$link);
	mysql_set_charset(utf8);

//准备sql语句，并执行：
	$sql="insert into users(username,name,pass,sex,email,addtime,phone,code,address) values('{$username}','{$name}','{$pass}','{$sex}','{$email}','{$addtime}','{$phone}','{$code}','{$address}')";
	$result=mysql_query($sql,$link);

//解析结果集：	
	if($result && mysql_affected_rows($link)){
		header("Location:index.php?p=4");
	}else{
		header("Location:zhuce.php?p=2");
	}











?>