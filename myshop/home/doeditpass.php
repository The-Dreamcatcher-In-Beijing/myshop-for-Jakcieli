<?php 
		
	$pass1=$_POST['pass1'];	
	$pass2=$_POST['pass2'];	
	$id=$_POST['id'];
	if($pass1!=$pass2){
		header("Location:editpass.php?p=1");
		die();
	}
	//导入配置文件：
	
		require('../public/dbconfig.php');

	//连接数据库并判断是否成功：
		$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());
			
	//设置字符集编码，选择数据库
		mysql_set_charset('utf8');
		mysql_select_db(DBNAME,$link);

	//准备sql语句，并执行（输入orders中）：
			
		$sql="update users set pass={$pass1} where id={$id}";
		
		$result=mysql_query($sql,$link);
		
		if(mysql_affected_rows($link)>0)
		{header("Location:editpass?p=2");
		}
		
	//关闭连接：
		mysql_close($link);
		
	
?>	
	
	

		
