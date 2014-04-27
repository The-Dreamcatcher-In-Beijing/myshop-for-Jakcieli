<?php 
session_start();//启动会话

?>
<html>
	<head>
	<meta charset="UTF-8">
		<title>我的购物车</title>
		<style>
			body{z-index:0;}
			a:hover{position:relative;top:1px;left:1px;}
			a{text-decoration:none;color:black;}
			table{border-color:teal;font-family:'微软雅黑';font-weight:1px; font-size:15px;color:black;}
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
				<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>居家</span></a></li>
				<li style='float:left;margin-left:40px;'><a href="lvlist.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>旅行</span></a></li>
				<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>服饰</span></a></li>
				<li style='float:left;margin-left:40px;'><a href="list.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>着迷</span></a></li>
				<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>联系我们</span></a></li><a name='top'>
				<li style='float:left;margin-left:40px;'><a href="selfcenter.php" target="_blank"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>个人中心</span></a></li><a name='top'>
		<!--		<li style='float:left;margin-left:40px;'><a href="showCart.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>购物车</span></a></li><a name='top'>   -->
			</ul>
		</div>
	
	
		<div class='content'>
		<center>
		<h2><font face='隶书' color='gray'>浏览我的购物车清单</font></h2>
			<table width="900">
				<input type='hidden' name='state' value='1'>
				
				<tr>
					<th align='center'>ID</th>
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
				
					<button onclick='window.location.href=\"updateCart.php?id={$v['id']}&num=-1\"'>-</button>
						{$v['num']}
					<button onclick='window.location.href=\"updateCart.php?id={$v['id']}&num=1\"'>+</button>
		
					</td>";
				echo "<td align='center' width='80'>￥".($v['price']*$v['num'])."</td>";
				echo "<td align='center' width=''>
						<a href='clearcart.php?id={$v['id']}'>删除</a>
					</td>";
				echo "</tr>";
				
				$sum+=$v["price"]*$v['num'];//总计
				
					
				
				}}
					$_SESSION['total']=$sum;
					
				?>		
				<tr>
					<th>总计金额：￥<?php echo $sum; ?></th>
					<th ><a href='clearcart.php'>清空购物车</a></th>
					<th colspan="4" ></th>
					<td align='center'><a href='./order.php'  ><img src='./image/js.jpg'></a></td>
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
