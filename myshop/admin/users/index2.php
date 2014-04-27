<?php session_start(); ?>
<html>
	<head>
		<title>浏览用户</title>
			<style>
			body{color:teal;}
			a{text-decoration:none;}
		
		</style>
	</head>
	<body bgcolor='bisque'>
		<center>
			<h2>搜索用户信息</h2>
	
	<!--=============搜素表单设置=====================-->		
			
		<form action='index2.php' method='get'>	
		姓名：<input type='text' placeholder="请输入用户姓名的关键字" name='name'>
		性别；<select name='sex'>
			<option name=''>-请选择-</option>
			<option value='0'>男</option>
			<option value='1'>女</option>
		<input type='submit' value='搜索'>	
		</form>	
			
	<!--=================================-->
			<table width="1000" border="1" cellspacing="0">
				<tr>
					<th>编号</th>
					<th>账号</th>
					<th>真实姓名</th>
					<th>性别</th>
					<th>地址</th>
					<th>邮编</th>
					<th>电话号码</th>
					<th>Email</th>
					<th>状态</th>
					<th>注册时间</th>
					<th>操作</th>
				</tr>
			<?php
				$sex=array(0=>'男',1=>'女');
				$state=array(0=>'禁用',1=>'开启',2=>'后台管理员');
			/* 浏览用户 */
				//导入数据库配置
				require("../../public/dbconfig.php");
				
				//连接数据库并判断
				$link=@mysql_connect(HOST,USER,PASS) or die("连接失败,原因".mysql_error());
				
				//选择数据库设置字符集
				mysql_select_db(DBNAME,$link);
				mysql_set_charset("utf8");
		
		
				
					$where="";	//声明一个用于放置搜索where条件的sql
					$wherelist = array(); //定义一个用于存放搜索条件的容器
					//判断并封装name字段
					if(!empty($_GET['name'])){
						$wherelist[]="name like '%{$_GET['name']}%'";
					}
					//判断并封装sex字段
					if($_GET['sex']!=""){										
						$wherelist[]="sex='{$_GET['sex']}'";
					}
					//判断拼装where语句
					if(count($wherelist)>0){
						$where=" where ".implode(" and ",$wherelist);
					}		
				
				
					echo $_GET['sex'];
				
				
				
		//================================================		
				//sql语句并执行
					$sql="select * from users".$where;
				
				$result=mysql_query($sql,$link);
			//解析结果集
				if($result && mysql_num_rows($result)>0){
					while($row=mysql_fetch_assoc($result)){
				
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['username']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>{$sex[$row['sex']]}</td>";
					echo "<td>{$row['address']}</td>";
					echo "<td>{$row['code']}</td>";
					echo "<td>{$row['phone']}</td>";
					echo "<td>{$row['email']}</td>";
					echo "<td>{$state[$row['state']]}</td>";
					echo "<td>".date("Y-m-d H:i:s",$row['addtime']+8*3600)."</td>";
					echo "<td><a href='action.php?action=del&k={$row['id']}'>删除</a>
								<a href='edit.php?k={$row['id']}'>修改</a>
							</td>";
					echo "</tr>";}
				}

			?>
		

			</table>
		</center>
	</body>
	

</html>























