<?php
 session_start();  
//print_r($_SESSION);
 
 if(isset($_GET['p'])){
	if($_GET['p']==1){
	echo "两次密码输入不一致！";
	}
	if($_GET['p']==2){
	echo " 修改成功！";
	}

	}
 ?>
<html>
	<head>
	<meta charset="UTF-8">
	<title>个人中心页</title>
	<style>
			body{z-index:0;}
			a:hover{position:relative;top:1px;left:1px;}
			a{text-decoration:none;color:black;}
			li{list-style:none;}
			table{
				border-color:teal;font-family:'微软雅黑';
				font-weight:1px;font-size:15px;color:black;}
		.outline{z-index:2;width:980px;height:600px;}
		.menu{width:260px;height:500px;text-align:center;
				border:1px solid black;float:left;margin-right:10px;
				background-color:red;border-radius:12px 12px 12px 12px;z-index;2;}
		
		.content{
			width:700px;height:500px;background-color:white;
			border:1px solid black;
			border-radius:12px 12px 12px 12px;float:2;float:left;}
		.menu ul{text-align:center;margin-right:20px;]
		
	
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
		<h2>我的个人中心</h2>
		<form action='doeditpass.php' method='post'>
		<table width='500' border='1'>
			<caption><h3>修改密码</h3></caption>
			<tr>
				<th>输入新密码</th>
				<td><input type='password'   name='pass1' ></td>
			</tr>
			<tr>
				<th>重新输入原密码</th>
				<td><input type='password'  name='pass2' ></td>
			
			<tr>
				<td colspan='2' align='center'>
					<input type='submit' value='提交' style='border-style:none;background-color:teal;border-radius:10px 10px 10px 10px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type='reset' value='重置' style='border-style:none;background-color:teal;border-radius:10px 10px 10px 10px;'>
				</td>
			</tr>
			<input type='hidden' name='id' value='<?php echo $_SESSION['adminuser']['id'];   ?>'>
			
		</table>
		</form>
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













