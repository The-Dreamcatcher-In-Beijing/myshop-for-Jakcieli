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
	<center>
		<h2><font face='隶书' color='gray'>商品信息添加</font></h2>
	<form action="action.php?action=add" method="post" enctype="multipart/form-data">	
		<table width="400" border="0" cellpadding='5' cellspacing='20'>
				<input type='hidden' name='state' value='1'>

			<tr>
				<td align='right'>商品类别</td>				
				<td>
					<select name='typeid'>
					<?php
						/* 浏览商品类别 */
						//导入数据库配置
						require("../../public/dbconfig.php");
						
						//连接数据库并判断
						$link=@mysql_connect(HOST,USER,PASS) or die("连接失败,原因".mysql_error());
						
						//选择数据库设置字符集
						mysql_select_db(DBNAME,$link);
						mysql_set_charset("utf8");
						
						//sql语句并执行
						$sql="select * from type order by concat(path,id) asc";
						$result=mysql_query($sql,$link);

					
						while($row=mysql_fetch_assoc($result)){
							
							$m=substr_count($row['path'],",")-1;
							$strpad=str_pad('',$m*12,"&nbsp;");
							$disabled=($row['pid']==0)?"disabled":"";
							echo "<option value='{$row['id']}' {$disabled}>{$strpad}{$row['name']}</option>";
						}
						
						
						//释放结果集，关闭连接
						  mysql_free_result($result);
						  mysql_close($link);
						?>
					</select>
				</td>
			</tr>
<!--		<tr>
				<td align='right'>商品编号</td>				
				<td><input type='text' name='typeid'></td>
			</tr>													-->
			<tr>
				<td align='right'>商品名称</td>				
				<td><input type='text' name='name'></td>
			</tr>
			<tr>
				<td align='right'>商品厂家</td>	
				<td><input type='text' name='company'></td>
			</tr>
			<tr>
				<td align='right'>上传图片	</td>
				<td><input type='file' name='pic'></td>
			</tr>
			<tr>
				<td align='right'>单价</td>	
				<td><input type='text' name='price'></td>
			</tr>
			<tr>
				<td align='right'>库存量</td>	
				<td><input type='text' name='store'></td>
			</tr>
			<tr>
				<td align='right'>被购买数量</td>	
				<td><input type='text' name='num'></td>
			</tr>
			<tr>
				<td align='right'>点击次数</td>	
				<td><input type='text' name='total'></td>
			</tr>
			<tr>
				<td align='right'>添加时间</td>	
				<td><input type='text' name='total'></td>
			</tr>
			
			<tr>
				<td align='right'>商品简介</td>	
				<td><textarea name='descr'></textarea></td>
			</tr>
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