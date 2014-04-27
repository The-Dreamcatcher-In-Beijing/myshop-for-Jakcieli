<?php
 session_start();  
//print_r($_SESSION);
 ?>
<html>
	<head>
	<title>个人中心页</title>
	<meta charset="UTF-8">
	<style>
			body{z-index:0;}
			a:hover{position:relative;top:1px;left:1px;}
			a{text-decoration:none;color:black;}
			li{list-style:none;}
			table{
				border-color:teal;font-family:'微软雅黑';
				font-weight:1px;font-size:15px;color:black;}
			table td{width:300px;}
		.outline{z-index:2;width:980px;height:600px;}
		.menu{width:200px;height:500px;text-align:center;
				border:10px solid black;float:left;margin-right:10px;
				background-color:red;border-radius:12px 12px 12px 12px;z-index:2;}
		
		.content{
			width:700px;height:500px;background-color:white;
			border:1px solid black;margin-right:10px;
			border-radius:12px 12px 12px 12px;float:2;float:left;}
		.menu ul{text-align:center;margin-right:20px;}
		
	.biankuang{width:20px;height:500px;z-index:2;margin-left:0px;float:left;}
	</style>
	</head>

	<body bgcolor='whitesmoke'>
		<center>
		<div style="width:80%;height:40px;background-color:#B50100;border:10px solid #b50100;border-radius:12px 12px 12px 12px;">
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
				<li style='float:left;margin-left:20px;'><a href="showCart.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>购物车</span></a></li><a name='top'>
			</ul>
		</div>
		</center>
		<center>
	<div class='outline'>
			<div class='menu'>
			<ul>
				<li><h2>个人中心</h2></li>
				
				<li><a href='seeself.php'><h3>查看个人信息</h3></a></li>
				
				<li><a href='editselfcenter.php'><h3>修改个人信息</h3></a></li>
			
				<li><a href='editpass.php'><h3>修改密码</h3></a></li>
				
				<li><a href='showordercenter.php'><h3>查看我的订单</h3></a></li>
				
				<li><a href='showCart.php'><h3>查看我的购物车</h3></a></li>
			</ul>
			</div>
		<div class='content'>
			<table border='1'>
			<tr>
				<td>你好！亲爱的用户：<?php echo $_SESSION['adminuser']['name']; ?></td>
				<td>当前时间：<?php echo date('Y-m-d H:i:s',time()+8*3600) ?></td>
				<td>当期ip地址：<?php echo $_SERVER["REMOTE_ADDR"]; ?></td>	
			</tr>
			<tr>
				<td></td>
			</tr>
			</table>
			
		</div>
	</div>	
		</center>
		
		<br><br><br><br>
		<div class="bottom">
			
			
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














