<?php
session_start();
//导入配置文件：
	require('../../public/dbconfig.php');
//连接数据库并判断
	$link=@mysql_connect(HOST,USER,PASS) or die("连接数据库失败原因是：".mysql_error());
//设置编码，选择数据库
	mysql_set_charset('utf8');
	mysql_select_db(DBNAME,$link);
//准备sql语句，并执行
/*		$name=$_POST['type'];
		$pid=$_POST['pid'];
		$path=$_POST['path'];
		$sql="insert into type values(null,'{$name}','{$pid}','{$path}')";
		$result=mysql_query($sql,$link);
		//判断结果并输出
		if($result && mysql_affected_rows($link)>0){
			//添加成功
			header("Location:add.php?e=0");
			}else{
			//添加失败
			header("Location:add.php?e=1");}
	


*/

	switch ($_GET['action']) {
		case 'add':
		$name=$_POST['name'];
		$pid=$_POST['pid'];
		$path=$_POST['path'];
		$sql="insert into type values(null,'{$name}','{$pid}','{$path}')";
	//	echo $sql;
		$result=mysql_query($sql,$link);
		//判断结果并输出
		if($result && mysql_affected_rows($link)>0){
		//添加成功
			header("Location:add.php?e=0");
			}else{
		//添加失败
			header("Location:add.php?e=1");
			exit();
			}
			break;
			case 'del':
			$id=$_GET['id'];
				$sql="delete from type where id={$id}";
				$result=mysql_query($sql);
			if($result && mysql_affected_rows($link)>0){
			//删除成功
			header("Location:index.php?e=2");}else{
			//删除失败
				header("Location:index.php?e=3");}
				break;
			
			case domodify:
			$name=$_POST['type'];
			$pid=$_POST['pid'];
			$path=$_POST['path'];
			$k=$_POST['id'];
	
			$sql="update type set  name='{$name}'  where id={$k}";
			$result=mysql_query($sql);
			if($result && mysql_affected_rows($link)>0){
			 header("Location:index.php?e=4");}else{
				 header("Location:index.php?e=5");
			}	break;}
	


	
//关闭连接
mysql_close($link);




?>