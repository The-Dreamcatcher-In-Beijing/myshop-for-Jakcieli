<?php session_start(); ?>
<html>
	<head>
		<title>添加用户</title>
	<style>
		table{border-color:teal;font-family:隶书;font-weight:1px; font-size:15px;color:teal;}
		.one,.two{ border-style:none;background:teal;border-radius:12px 12px 12px 12px;}
	</style>
	</head>
<body>
	<?php
			/* 浏览用户 */
				//导入数据库配置
				require("../../public/dbconfig.php");
				
				//连接数据库并判断
				$link=@mysql_connect(HOST,USER,PASS) or die("连接失败,原因".mysql_error());
				
				//选择数据库设置字符集
				mysql_select_db(DBNAME,$link);
				mysql_set_charset("utf8");
				
				//sql语句并执行
				$id=$_GET['k'];
				$sql="select * from users where id={$k}";
				$result=mysql_query($sql,$link);
				$row=mysql_fetch_assoc($result);


	?>
	<center>
		<h2><font face='隶书' color='gray'>修改管理员信息</font></h2>
	<form action="action.php?action=doedit" method="post" >		
		<table width="300" border="0" cellpadding='5' cellspacing='5'>
			<tr>
				<td align='center'>账号</td>				
				<td><input type='hidden' name='id' value='<?php echo $row['id'];  ?>'>
					<input type='text' name='username' value='<?php echo $row['username'];  ?>'></td>
			</tr>
			<tr>
				<td align='center'>真实姓名</td>				
				<td><input type='text' name='name' value='<?php echo $row['name'];  ?>'></td>
			</tr>
			<tr>
				<td align='center'>性别</td>
				<td align=''>
					男<input type='radio' name='sex' value='0' checked>&nbsp;&nbsp;&nbsp;&nbsp;
					女<input type='radio' name='sex' value='1'>
				</td>
			</tr>
			<tr>
				<td align='center'>地址</td>				
				<td><input type='text' name='address' size='30' value='<?php echo $row['address'];  ?>'></td>
			</tr>
			<tr>
				<td align='center'>邮编</td>				
				<td><input type='text' name='code' size='30' value='<?php echo $row['code'];  ?>'></td>
			</tr>
			<tr>
				<td align='center'>电话</td>				
				<td><input type='text' name='phone' size='30' value='<?php echo $row['phone'];  ?>'></td>
			</tr>
			<tr>
				<td align='center'>Email</td>				
				<td><input type='text' name='email' size='30' value='<?php echo $row['email'];  ?>'></td>
			</tr>
			<tr>
				<td align='center'>状态</td>				
				<td>
					启用<input type='radio' name='state' value='1' checked>
					禁用<input type='radio' name='state'value='0' >
				后台管理员<input type='radio' name='state'  value='2'>
				</td>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<input type='submit' value='提交' class='one'>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type='submit' value='重置' class='two'>
				</td>
			</tr>
				
		</table>
	</form>
	</center>
</body>
</html>