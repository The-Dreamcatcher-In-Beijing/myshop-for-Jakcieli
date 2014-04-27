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
			<h2>浏览用户</h2>
			<!-- ========搜索表单===================-->
			<form action="index3.php" method="get">
				姓名：<input type="text" name="name" size="6" value="<?php echo $_GET['name'] ?>"/>
				性别：<select name="sex">
						<option value="">-全部-</option>
						<option value="m" <?php echo ($_GET['sex']=='m')?"selected":""; ?>>男</option>
						<option value="w" <?php echo ($_GET['sex']=='w')?"selected":""; ?>>女</option>
					  </select>
				<input type="submit" value="搜索"/>
			</form>
		<!-- ===================================-->	
			
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
			//===========封装搜索条件=======================
				$where=""; //声明一个用于放置搜索where条件的sql
				$wherelist = array(); //定义一个用于存放搜索条件的容器
				$url=""; //声明一个搜索条件的url字串
				$urllist=array(); //定义一个用于存放url参数值的
				//判断并封装name字段
				if(!empty($_GET['name'])){
					$wherelist[]="name like '%{$_GET['name']}%'";
					$urllist[]="name={$_GET['name']}";
				}
				//判断并封装sex字段
				if(!empty($_GET['sex'])){
					$wherelist[]="sex='{$_GET['sex']}'";
					$urllist[]="sex={$_GET['sex']}";
				}
				//判断拼装where语句
				if(count($wherelist)>0){
					$where=" where ".implode(" and ",$wherelist);
					$url = "&".implode("&",$urllist);
				}
				
				//==============================================
				?>
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
			
				//===========数据分页处理=====================
					$page=isset($_GET['p'])?$_GET['p']:1; //当前页
					$pagesize=5;	//页大小（每页几条数据）
					$maxpage=0;	//最大页数
					$maxrows=0; //最大数据条数
					
					//获取最大数据条数
					$sql = "select count(*) from users {$where}";
					$result = mysql_query($sql,$link);
					$maxrows = mysql_result($result,0,0); //直接获取结果集的第一行第一列的值
					//计算最大页数
					$maxpage = ceil($maxrows/$pagesize); //进一法取整
					//判断页号是否越界
					if($page>$maxpage){
						$page=$maxpage;
					}
					if($page<1){
						$page=1;
					}
					//拼装分页sql语句limit【limit (页号-1)*页大小,页大小】
					$limit = " limit ".(($page-1)*$pagesize).",".$pagesize;
					
				//============================================
				//sql语句并执行
					$sql = "select * from users ".$where.$limit;
					$result = mysql_query($sql,$link);
					
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
			<br><br>
		
				<?php
					//===========输出分页信息=================
					echo "当前第{$page}/{$maxpage}页 共计{$maxrows}条 ";
					echo " <a href='index3.php?p=1{$url}'>首页</a> ";
					echo " <a href='index3.php?p=".($page-1)."{$url}'>上一页</a> ";
					echo " <a href='index3.php?p=".($page+1)."{$url}'>下一页</a> ";
					echo " <a href='index3.php?p={$maxpage}{$url}'>末页</a> ";
					
					echo "<br/><br/>";
					echo "第 ";
					for($i=1;$i<=$maxpage;$i++){
						echo " <a href='index3.php?p={$i}{$url}'>{$i}</a> ";
					}
					echo " 页";
				     
				?>
				
		</center>
	</body>
	

</html>























