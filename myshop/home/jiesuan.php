<?php 
session_start();//启动会话  订单页面
if(empty($_SESSION['adminuser'])){
	header("Location:index.php?p=3");
	die();
}
?>

<?php
$id=$_GET['id'];
//导入数据库：
	require('../public/dbconfig.php');

//连接数据库并判断：
	$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());

//设置字符集编码，选择数据库：
	mysql_set_charset('utf8');
	mysql_select_db(DBNAME,$link);

//准备sql语句，并执行：
	$sql="select * from orders where id={$id}";
	$result=mysql_query($sql,$link);
	$row=mysql_fetch_assoc($result);
//	print_r($row);
	
?>

<html>
	<head>
	<meta charset="UTF-8">
		<title>确认</title>
		<style>
			body{z-index:0;}
			a:hover{position:relative;top:1px;left:1px;}
			a{text-decoration:none;color:black;}
			table{border-color:teal;font-family:'微软雅黑';font-weight:1px; font-size:15px;color:black;}
			li{list-style:none;}
			.content{width:80%;height:auto;background-color:white;margin-left:10%;border-radius:12px 12px 12px 12px;z-index:2}
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
		<h2><font face='隶书' >收货地址</font></h2>
		<form action='showorder.php' method='post'>
		<table width='700' border='1'>
			<tr>		
				<th>订单ID</th>
				<th>收件人</th>
				<th>地址</th>
				<th>邮编</th>
				<th>电话</th>
				<th>总金额</th>
			</tr>	
			<tr>	
				<td><?php echo $row['id'];  ?></td>
				<td><?php echo $row['linkman'];  ?></td>

				<td><?php echo $row['address'];  ?></td>

				<td><?php echo $row['code'];  ?></td>

				<td><?php echo $row['phone'];  ?></td>

				<td >&nbsp;&nbsp;&nbsp;&nbsp;￥<?php echo $row['total']; ?></td>
			</tr>	
			<tr>
				<td colspan='6'align='center'>
					<input type='submit' value='确认提交'   style="border-style:none;background-color:red;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href='order.php'  style="border-style:none;background-color:red;">返回修改</a>
			</tr>
			<input type='hidden' name='orderid' value='<?php echo $row['id'];  ?>'>
		</table>
		</form>
		<h2><font face='隶书' >我的订单</font></h2>
			<table width="900" border='1' >
				<input type='hidden' name='state' value='1'>
				
				<tr>
					<th align='center'>商品ID</th>
					<th align='center' style="width:100px;">商品名称</th>				
					<th align='center'>图片名</th>
					<th align='center'>单价</th>
					<th align='center'>数量</th>
					<th align='center'>小计</th>	
					<th align='center'>操作</th>	 
				</tr>
				
			
				
				<?php
			
				$sum=0;//定义一个总金额的变量
				if(isset($_SESSION['shoplist'])){
				foreach($_SESSION['shoplist'] as $v){
				echo "<tr height='100'>";
				echo "<td align='center'>{$v['id']}</td>";
				echo "<td align='center' width='220'>{$v['goods']}</td>";
				echo "<td align='center'><img src='./include/image/s_{$v['picname']}'></td>";
				echo "<td align='center' width='30'>￥{$v['price']}</td>";
				echo "<td align='center' width='120'>
						{$v['num']}
					</td>";
					
				//进行商品库存量的的更改：
					$sql1="select * from goods where id='{$v['id']}'";
					$result1=mysql_query($sql1,$link);
					$row1=mysql_fetch_assoc($result1);
					$store=$row1['store']-$v['num'];
					if($store<0){
						die("库存不足！");
					}
					$num=$row1['num']+$v['num'];
				//进行更改：	
						$sql2="update goods set store='{$store}',num='{$num}' where id='{$v['id']}'";
						$result2=mysql_query($sql2,$link);
				echo "<td align='center' width='80'>￥".($v['price']*$v['num'])."</td>";
				echo "<td align='center'>已提交</td>";
				echo "</tr>";
				
				$sum+=$v["price"]*$v['num'];//总计
				}}
				?>	
				<tr>
					<th>总计金额：</th>
					<th colspan="5" ></th>
					<th style="background-color:red;"><span style="width:100px;height:20px;color:white;">￥<?php echo $_SESSION['total']; ?></span></th>
				</tr>
				
				
				
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