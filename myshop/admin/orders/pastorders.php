<html>
	<head>
	<meta charset="UTF-8">
		<title>商品信息管理</title>
		<style>
			body{z-index:0;}
			a:hover{position:relative;top:1px;left:1px;}
			a{text-decoration:none;color:black;}
			table{border-color:teal;font-family:'微软雅黑';font-weight:1px; font-size:15px;color:black;border-radius:12px 12px 12px 12px;z-index:2;}
			tr{background-color:;margin:20px;}
			li{list-style:none;}
			.content{width:1100px;height:auto;background-color:gray;border-radius:12px 12px 12px 12px;z-index:2}
		</style>
	</head>
	<body bgcolor='whitesmoke'>
		<div class='content'>
		<center>
		<h2><font face='隶书' >订单展示</font></h2>
		<table width='1000' border='1'>
			<tr>		
				<th>订单ID号</th>	
				<th>会员ID号</th>	
				<th>收货人</th>	
				<th>地址</th>	
				<th>邮编</th>	
				<th>电话</th>	
				<th>下单时间</th>	
				<th>总金额</th>	
				<th>状态</th>	
				<th>操作</th>	
			</tr>
				<?php
					
				//执行订单详情存入数据库：
					$id=$_POST['orderid'];

				//导入配置文件：
					require('../../public/dbconfig.php');

				//连接数据库并判断是否成功：
					$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());
						
				//设置字符集编码，选择数据库
					mysql_set_charset('utf8');
					mysql_select_db(DBNAME,$link);
					
					
												
			//=======================数据分页处理=========================		
					$page=isset($_GET['p'])?$_GET['p']:1;		
					$pagesize=5;		
					$maxpage=0;
					$maxrows=0;
					
				//计算最大的页数：	
					$sql="select count(*) from orders where status=1";
					$result=mysql_query($sql,$link);
					$maxrows=@mysql_result($result,0,0);//获取数据条数
				//获取最大页数
					$maxpage=ceil($maxrows/$pagesize);
				//判断页是否越界
					if($page>$maxpage){
						$page=$maxpage;}
					if($page<1){
						$page=1;
					}
				
				//拼装分页sql语句（limit【当前页-1】*页大小，【页大小】）
					$limit=" limit ".($page-1)*$pagesize.",".$pagesize;
			

				//查询订单及订单详情并输出：	
					$sql="select * from orders where status=1".$limit;
					$result=mysql_query($sql,$link);
					
				//解析
						$a=array(0=>'未确认',1=>'已发货');
					if($result&&mysql_num_rows($result)>0){
						while($row=mysql_fetch_assoc($result)){
						echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$row['uid']}</td>";
						echo "<td>{$row['linkman']}</td>";
						echo "<td>{$row['address']}</td>";
						echo "<td>{$row['code']}</td>";
						echo "<td>{$row['phone']}</td>";
						echo "<td>".date('Y-m-d H:i:s',$row['addtime'])."</td>";
						echo "<td>￥{$row['total']}</td>";
						echo "<td>{$a[$row['status']]}</td>";
						echo "<td style='background-color:red'>
						<a href='pastorders.php?p={$row['id']}'>查看详情</a></td>";
						echo "<tr>";		
						}
					}
				
				?>
		</table>
				
			
			<table width='900' border='1'>
			 <tr><td colspan='5' style='background-color:orange;' align='center'>订单详情</td><tr>
			<tr>		
				<th>商品编号</th>	
				<th>商品名称</th>	
				<th>单价</th>	
				<th>数量</th>	
				<th>小计</th>	
			</tr>
			
					
				<?php
				//获取id号输出订单详情：
					$k=$_GET['p'];
			
				//准备sql语句，并执行：
					$sql="select * from detail where orderid={$k}";
					$result=mysql_query($sql,$link);
					if($result&&mysql_num_rows($result)>0){
					while($row=mysql_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>{$row['goodsid']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>￥{$row['price']}</td>";
					echo "<td>{$row['num']}</td>";
					echo "<td>￥".($row['price']*$row['num'])."</td>";
					echo "</tr>";
					
					}}
					//关闭数据库连接
					mysql_close($link);
					
				?>
				
			</table>
				<br><br>
			<?php
						
	//====================输出分页信息===============================	
		echo "<div class='fenye'>";
		echo "当前页{$page}/{$maxpage}  共{$maxrows}个商品";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='pastorders.php?p=1'>首页|</a>";
		echo "<a href='pastorders.php?p=".($page-1)."'>上一页|</a>";
		echo "<a href='pastorders.php?p=".($page+1)."'>下一页|</a>";
		echo " <a href='pastorders.php?p={$maxpage}'>末页</a> ";
		echo "</div>";
			
			
			?>


			
					
		</center>
		</div>
		
		
		
		
	</body>
</html>