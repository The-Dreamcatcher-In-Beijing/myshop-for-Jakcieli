<?php
	session_start();
	
//执行订单存入数据库：
	$uid=$_SESSION['adminuser']['id'];
	
	$linkman=$_POST['linkman'];
	
	$address=$_POST['address'];
	
	$code=$_POST['code'];

	$phone=$_POST['phone'];
	
	$addtime=time();
	
	$total=$_SESSION['total'];

	$status=0;
	
//判断是否购买了商品:	
	if($total==0){
	echo "<script>alert('没有购买商品，请先购买！');window.history.back();</script>"; 
	}

//导入配置文件：
	require('../public/dbconfig.php');

//连接数据库并判断是否成功：
	$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());
		
//设置字符集编码，选择数据库
	mysql_set_charset('utf8');
	mysql_select_db(DBNAME,$link);

//准备sql语句，并执行（输入orders中）：
	$sql="insert into orders(id,uid,linkman,address,code,phone,addtime,total,status) values(null,'{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$addtime}','{$total}','{$status}')";
	$result=mysql_query($sql,$link)	;
	$id=mysql_insert_id($link);
	if(mysql_affected_rows($link)>0){
	header("Location:jiesuan.php?p=1&id={$id}");
	}else{
	header("Location:order.php?p=2");}
	

//关闭数据库连接
	mysql_close($link);
	
	
	
	
	
	
	
	
	
?>