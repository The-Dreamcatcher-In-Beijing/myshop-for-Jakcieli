<?php
	session_start();
?>
<html>
	<head>
	<meta charset="UTF-8">
		<title>个人中心页</title>
		<style>
			body{z-index:0;}
			a:hover{position:relative;top:1px;left:1px;}
			a{text-decoration:none;color:black;}
			table{border-color:teal;font-family:'微软雅黑';font-weight:1px; font-size:15px;color:black;border-radius:12px 12px 12px 12px;z-index:2;}
			tr{background-color:;margin:20px;}
			li{list-style:none;}
			.content{width:980px;height:auto;background-color:white;margin-left:15%;border-radius:12px 12px 12px 12px;z-index:2}
		</style>
	</head>
	<body bgcolor='whitesmoke'>
	
		<div style="width:80%;height:40px;background-color:#B50100;border:10px solid #b50100;margin-left:10%;border-radius:12px 12px 12px 12px;">
			<ul>
				<li style='float:left;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>关于乐活</span></a></li>
				<li style='float:left;margin-left:20px;'><a href="index.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>首页</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>时尚数码</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>乐活音乐</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>居家</span></a></li>
				<li style='float:left;margin-left:20px;'><a href="lvlist.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>旅行</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>服饰</span></a></li>
				<li style='float:left;margin-left:20px;'><a href="list.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>着迷</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>联系我们</span></a></li><a name='top'>
				<li style='float:left;margin-left:20px;'><a href="selfcenter.php" target="_blank"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>个人中心</span></a></li><a name='top'>
				<li style='float:left;margin-left:40px;'><a href="showCart.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>购物车</span></a></li><a name='top'>
			</ul>
		</div>
			
				
		<div class='content'>
		<center>
		<h2><font face='隶书' >我的订单</font></h2>
		<table width='900' border='1'>
			<tr>		
				<th>订单ID号</th>	
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
					require('../public/dbconfig.php');

				//连接数据库并判断是否成功：
					$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());
						
				//设置字符集编码，选择数据库
					mysql_set_charset('utf8');
					mysql_select_db(DBNAME,$link);

				//准备sql语句，并执行（输入detai中）：
					if(!empty($_SESSION['shoplist'])){
					foreach($_SESSION[shoplist] as $v){
						$sql="insert into detail values(null,'{$id}','{$v['typeid']}','{$v['goods']}','{$v['price']}','{$v['num']}')";
						$result=mysql_query($sql,$link);
					}
					}
				//查询订单及订单详情并输出：	
					$sql="select * from orders where uid={$_SESSION['adminuser']['id']}";
					$result=mysql_query($sql,$link);
					
				//解析
					if($result&&mysql_num_rows($result)>0){
						while($row=mysql_fetch_assoc($result)){
						echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$row['linkman']}</td>";
						echo "<td>{$row['address']}</td>";
						echo "<td>{$row['code']}</td>";
						echo "<td>{$row['phone']}</td>";
						echo "<td>".date('Y-m-d H:i:s',$row['addtime'])."</td>";
						echo "<td>{$row['total']}</td>";
						echo "<td>已确认</td>";
						echo "<td style='background-color:red'>
						<a href='showorder.php?p={$row['id']}'>查看详情</a> || <a href='zhifu.php?p={$row['id']}'>订单支付</a></td>";
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
					$sql="select * from detail where orderid={$k} ";
					$result=mysql_query($sql,$link);
					if($result&&mysql_num_rows($result)>0){
					while($row=mysql_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>{$row['goodsid']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>{$row['price']}</td>";
					echo "<td>{$row['num']}</td>";
					echo "<td>".($row['price']*$row['num'])."</td>";
					echo "</tr>";
					
					}}
					//关闭数据库连接
					mysql_close($link);
					
				
				?>
			</table>		
					
		</center>
		</div>
		<br><br><br><br>
		<div class="bottom" style=''>
			
			
			<hr width="950">
			
			<div class="fontcolor_blue" align="center">
			<a href="#">关于乐活 广告服务</a>
			<a href="#">合作伙伴</a>
			<a href="#">客户中心</a>
			<a href="#">诚征英才</a>
			<a href="#">联系我们</a>
			<a href="#">网站地图</a>
			<a href="#">热门品牌 版权说明</a>
			</div>
		
			
			<div align="center">
			全球乐活网 ：
			<a href="#">中国站</a>
			<a href="#">国际站 日文站 乐活站 支付宝 中国雅虎 口碑网  乐活推广联盟 </a>
			</div>
			
			<div align="center">Copyright 2010-2050, 版权所有 LOHAS.COM</div>
		
			<div class="fontcolor_blue" align="center">ICP证：京C2-20050291</div>
			
			<div align="center">广告经营许可证号：3301061000468</div>
			
		</div>
		




		
		
		
		
		
	</body>
</html>