<?php

   $id=$_GET['p'];
//导入数据库：
	require('../../public/dbconfig.php');

//连接数据库并判断：
	$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());

//设置字符集编码，选择数据库：
	mysql_set_charset('utf8');
	mysql_select_db(DBNAME,$link);

//准备sql语句，并执行：
	$sql=" update orders set status=1 where  id={$id}";
	$result=mysql_query($sql,$link);
	
//判断：
	if(mysql_affected_rows($link)>0){
	echo "<script>alert('修改成功！');window.history.back();</script>"; 

	}else{
	echo "<script>alert('您修改有误！');window.history.back();</script>"; 
	}
	



?>