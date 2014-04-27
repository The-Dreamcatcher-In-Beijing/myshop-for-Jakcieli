<?php 
		$name=$_POST['name'];
		
		$code=$_POST['code'];
		
		$phone=$_POST['phone'];
		
		$email=$_POST['email'];
		
		$address=$_POST['address'];
		
		$id=$_POST['id'];
		
		//导入配置文件：
		
			require('../public/dbconfig.php');

		//连接数据库并判断是否成功：
			$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());
				
		//设置字符集编码，选择数据库
			mysql_set_charset('utf8');
			mysql_select_db(DBNAME,$link);

		//准备sql语句，并执行（输入orders中）：
				
			$sql="update users set name='{$name}',code='{$code}',phone='{$phone}',email='{$email}',address='{$address}' where id={$id}";
			
			$result=mysql_query($sql,$link);
			
			if(mysql_affected_rows($link)>0){
				echo "<script> alert('修改成功');window.history.back();</script>"; 

			}
			
		//关闭连接：
			mysql_close($link);
			
		
?>	
		
		

		
