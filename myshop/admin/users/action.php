<?php
session_start();
//配置文件导入
require('../../public/dbconfig.php');
//连接数据库，并判断
$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());
//设置字符集编码，选择数据库
mysql_select_db(DBNAME,$link);
mysql_set_charset('utf8');
//准备sql语句，并执行



switch ($_GET['action']) {
	case add:
		$username=$_POST['username'];
		$name=$_POST['name'];
		$pass=md5($_POST['userpass']);
		$sex=$_POST['sex'];
		$address=$_POST['address'];
		$code=$_POST['code'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$state=$_POST['state'];
		$addtime=time();
		$sql="insert into users values(null,'{$username}','{$name}','{$pass}','{$sex}','{$address}','{$code}','{$phone}','{$email}','{$state}','{$addtime}')";
		$result=mysql_query($sql,$link);
		if($result && mysql_affected_rows($link)>0){
			//成功
			header("Location:./add.php?e=0");
		}else{
			//失败
			header("Location:./add.php?e=1");
			}
		break;	
	case del:
		$k=$_GET['k'];
		$sql="delete from users where id={$k}";
		$result=mysql_query($sql,$link);
		if($result && mysql_affected_rows($link)){
			//成功
			header("Location:index.php?e=0");
		}else{
				header("Location:index.php?e=1");}
		break;
		case doedit:
			$username=$_POST['username'];
			$name=$_POST['name'];
			$sex=$_POST['sex'];
			$address=$_POST['address'];
			$code=$_POST['code'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$state=$_POST['state'];
			$addtime=time();
			$k=$_POST['id'];
			$sql="update users set username='{$username}', name='{$name}',sex='{$sex}', address='{$address}',code='{$code}',phone='{$phone}',email='{$email}',state='{$state}',addtime='{$addtime}'  where id={$k}";
			$result=mysql_query($sql,$link);
		//	echo $sql;
		//	print_r	(mysql_fetch_assoc($result));
			if($result && mysql_affected_rows($link)){
			//成功
			header("Location:index.php?e=2");
				}else{
				header("Location:index.php?e=3");}
			break;
		}	
//关闭，释放
mysql_close($link);













?>