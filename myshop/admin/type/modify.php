
<html>
	<head>	
	<title>更改商品的类别</title>
	</head>
	<body>
		<center>
		<h3>更改商品分类<h3>
		<?php
		//导入配置文件
		require('../../public/dbconfig.php');
		//连接数据库，并判断
		$link=@mysql_connect(HOST,USER,PASS) or die("连接数据库失败！原因是".mysql_error());
		//选择数据库，设置字符集编码
		mysql_set_charset('utf8');
		mysql_select_db(DBNAME,$link);
		//准备sql语句，并执行
		$id=$_GET['k'];
		$sql="select * from type where id={$id}";
		$result=mysql_query($sql);
		$row=mysql_fetch_assoc($result);
		
		?>
		<form action="action.php?action=domodify" method='post'>
			<table width='400' border='1' cellpadding='5' cellspacing='0'>
				<tr>
					<td width='100' align='right'>添加分类：</td>
					<td >
					<input type='hidden' name='pid' value='0'>
					<input type='hidden' name='id' value="<?PHP echo $row['id'];  ?>">
					<input type='hidden' name='path' value='0,'>
					<input type='text' name='type'  value="<?php echo $row['name'];?>"size='30'>
					</td>
				</tr>
				<tr>
					<td colspan='2' align='center'>
					<input type='submit' name='tijiao' value='提交'>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type='reset' name='chongzhi' value='重置'>
					</td>
				</tr>
			</table>
		</form>
		</center>
	<body>
</html>




