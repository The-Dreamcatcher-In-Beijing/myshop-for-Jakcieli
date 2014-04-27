<?php 
session_start();//启动会话  订单页面
if(empty($_SESSION['adminuser'])){
	header("Location:index.php?p=3");
	die();
	if($_GET[id]==2){
		echo "存入数据失败，请重新填写!";
	}
	
	
	
}
?>
<html>
	<head>
	<meta charset="UTF-8">
		<title>收货人信息</title>
		<style>
			body{z-index:0;}
			a:hover{position:relative;top:1px;left:1px;}
			a{text-decoration:none;color:black;}
			table{border-color:teal;font-family:'微软雅黑';font-weight:1px; font-size:15px;color:black;}
			tr{background-color:;margin:20px;}
			li{list-style:none;}
			.content{width:980px;height:300px;background-color:white;margin-left:15%;border-radius:12px 12px 12px 12px;z-index:2}
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
		
	<?php 
		echo "<pre>";
//		print_r($_SESSION['shoplist']); 
		echo "</pre>";
	?>
	
		<div class='content'>
		<center>
		<h2><font face='隶书' >输入收货信息</font></h2>
		<form action='doorder.php' method='post'>
		<table width='600' border='1'>
			<tr>		
				<th>收件人</th>
				<td><input type='text' value='<?php echo $_SESSION['adminuser']['name'];  ?>' name='linkman'></td>
			</tr>	
			<tr>		
				<th>地址</th>
				<td><input type='text' value='<?php echo $_SESSION['adminuser']['address'];  ?>' name='address' size='30'></td>
			</tr>
			<tr>		
				<th>邮编</th>
				<td><input type='text' value='<?php echo $_SESSION['adminuser']['code'];  ?>' name='code'></td>
			</tr>	
			<tr>		
				<th>电话</th>
				<td><input type='text' value='<?php echo $_SESSION['adminuser']['phone'];  ?>' name='phone'></td>
			</tr>	
			<tr>		
					<th style='background-color:red;'>总金额</th>
					<td >￥<?php echo $_SESSION['total'];  ?></td>
			</tr>	
		
			<tr>
				<td colspan='2'align='center'>
					<input type='submit' value='提交'style="boder-style:none;" >
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type='reset' value='重置' style="boder-style:none;">
				</td>
			</tr>
		</table>
		</form>
		
	
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